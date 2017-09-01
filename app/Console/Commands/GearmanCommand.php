<?php

namespace App\Console\Commands;

use App\Helpers\Embed;
use App\Models\Link;
use App\Models\Tracker;
use Bavix\Gearman\Client;
use Bavix\Gearman\Worker;
use Bavix\Helpers\JSON;
use Embed\Http\CurlDispatcher;
use Illuminate\Console\Command;

class GearmanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bx:gearman';

    /**
     * @var Client
     */
    protected $client;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'bavix metabot';
    protected $userAgent   = 'Mozilla/5.0 (compatible; bavix/metabot-v2.1; +https://bavix.ru/bot.html)';

    /**
     * GearmanCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function client()
    {
        if (!$this->client)
        {
            $this->client = new Client();
            $this->client->addServer(
                config('gearman.host'),
                config('gearman.port')
            );
        }

        return $this->client;
    }

    protected function addTaskVirus(Link $link)
    {
        $this->info('Add task "Virus" on link ' . $link->url);

        if ($link->is_porn)
        {
            $this->client()->doHighBackground('virus', serialize($link));
            return;
        }

        $this->client()->doLowBackground('virus', serialize($link));
    }

    protected function addTaskPorn(Link $link)
    {
        $this->info('Add task "Porn" on link ' . $link->url);
        $this->client()->doBackground('porn', serialize($link));
    }

    protected function req($uri, $data)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_VERBOSE, 1);
//        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        return $ch;
    }

    protected function porn(Link $link)
    {
        if (!$link->active || $link->blocked)
        {
            return;
        }

        // url
        $rules = config('porn.url', []);

        // config rules
        foreach ($rules as $rule)
        {
            $this->warn('Check rule [type=url] "' . $rule . '" on link ' . $link->url);
            if (preg_match($rule, $link->url))
            {
                $link->is_porn = 1;
                $link->save();

                return;
            }
        }

        $parameters = JSON::decode($link->parameters) ?: [];

        // title | description
        $rules = config('porn.keywords', []);

        $tags  = $parameters['tags'] ?? [];
        $words = array_merge([$parameters['title']], $tags);

        // config rules
        foreach ($rules as $rule)
        {
            // if url is porn website
            if ($link->is_porn)
            {
                break;
            }

            $this->warn('Check rule [type=keywords] "' . $rule . '" on link ' . $link->url);
            foreach ($words as $word)
            {
                if (preg_match($rule, $word))
                {
                    $this->info('Porn content is found! `' . $word . '` from url ' . $link->url);
                    $link->is_porn = 1;
                    $link->save();

                    return;
                }
            }
        }

    }

    protected function phishtank(Link $link)
    {

        $apiKey = ENV('PHISHTANK_API_KEY', null);

        // if not api key OR blocked OR not active
        if (!$apiKey || $link->blocked || !$link->active)
        {
            if ($apiKey)
            {
                $this->warn('URL is blocked or not active!');
            }
            else
            {
                $this->warn('API key not found ' . __METHOD__);
            }

            return;
        }

        $uri = 'https://phishtank.com/checkurl/';

        $ch = $this->req($uri, [
            'app_key' => $apiKey,
            'format'  => 'json',
            'url'     => $link->url,
        ]);

        $result      = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ((int)$status_code === 200)
        {
            $data = JSON::decode($result);

            $results = $data['results'] ?? [];

            if (!empty($results['in_database']) && !empty($results['valid']))
            {
                $link->blocked = true;

                if (null === $link->message)
                {
                    $link->message = 'URL is a phish! ' .
                        'In more detail according to the reference ' .
                        $results['phish_detail_page'];
                }

                $link->save();
            }
        }

        curl_close($ch);

    }

    protected function virusTotal(Link $link)
    {
        $apiKey = ENV('VT_API_KEY', null);

        // if not api key OR blocked OR not active
        if (!$apiKey || $link->blocked || !$link->active)
        {
            if ($apiKey)
            {
                $this->warn('URL is blocked or not active!');
            }
            else
            {
                $this->warn('API key not found ' . __METHOD__);
            }

            return;
        }

        $uri = 'https://www.virustotal.com/vtapi/v2/url/report';

        $ch = $this->req($uri, [
            'apikey'   => $apiKey,
            'resource' => $link->url,
        ]);

        $queue       = true;
        $result      = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ((int)$status_code === 200)
        {
            $data = JSON::decode($result);

            if (isset($data['scans']))
            {
                $queue = false;

                foreach ($data['scans'] as $antiVirus => $mixed)
                {
                    $this->info('' . $antiVirus . ': ' . $mixed['result']);
                    if ($mixed['detected'])
                    {
                        $link->blocked = true;

                        if (null === $link->message)
                        {
                            $link->message = $antiVirus . ' found ' . $mixed['result'];
                        }

                        $link->save();
                        break;
                    }
                }
            }
        }

        if (!empty($result['response_code']) && $queue)
        {
            try
            {
                $this->error($result);
                sleep(14);
                $this->addTaskVirus($link);
            }
            catch (\Throwable $throwable)
            {
            }
        }

        curl_close($ch);

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $console = $this;

        $dispatcher = new CurlDispatcher([
            CURLOPT_MAXREDIRS      => 20,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT        => 5,
            CURLOPT_ENCODING       => 'UTF-8',
            CURLOPT_AUTOREFERER    => true,
            CURLOPT_USERAGENT      => $this->userAgent,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4,

            CURLOPT_HTTPHEADER => [
                'Accept-Language: en,en-US;q=0.8,ru;q=0.6'
            ],

            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
        ]);

        $worker = new Worker();
        $worker->addServer(
            config('gearman.host'),
            config('gearman.port')
        );

        $worker->addFunction('tracker', function (\GearmanJob $job) use ($console) {
            /**
             * @var Tracker $model
             */
            $workload = $job->workload();
            $model    = unserialize($workload, []);
            $console->info('New visitor ' . $model->created_at . '; URL: ' . $model->url . '; IP: ' . $model->ip);
            $model->save();
        });

        $worker->addFunction('virus', function (\GearmanJob $job) use ($console) {
            /**
             * @var Link $model
             */
            $model = unserialize($job->workload(), []);
            $this->info('scan: ' . $model->url);
            $console->phishtank($model);
            $console->virusTotal($model);
        });

        $worker->addFunction('porn', function (\GearmanJob $job) use ($console) {
            /**
             * @var Link $model
             */
            $model = unserialize($job->workload(), []);
            $this->info('search porn content: ' . $model->url);
            $console->porn($model);
        });

        $worker->addFunction('metadata', function (\GearmanJob $job) use ($console, $dispatcher) {
            /**
             * @var Link $model
             */
            $model = unserialize($job->workload(), []);

            try
            {

                $console->info('read metadata from: ' . $model->url);
                $model->parameters = JSON::encode(
                    $data = Embed::read(
                        $model->url,
                        null,
                        $dispatcher
                    )
                );

                if ($data)
                {
                    if ($data['url'] === $data['title'])
                    {
                        $model->retry++;
                        $model->save();

                        $console->info('Retry model link');
                        $console->client()
                            ->doBackground('metadata', serialize($model));

                        return;
                    }

                    $model->retry = 0;

                }
                else
                {
                    $console->client()
                        ->doBackground('metadata', serialize($model));

                    return;
                }

                $console->info('metadata: ' . $model->parameters);
                $console->addTaskPorn($model);

                $console->addTaskVirus($model);

            }
            catch (\Throwable $throwable)
            {
                $console->info('fatal error: ' . $throwable->getMessage());
                $model->active = 0; // todo : добавить retry!!!
            }

            $model->save();
        });

        while ($worker->work())
        {
        }

        return;
    }

}
