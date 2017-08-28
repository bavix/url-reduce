<?php

namespace App\Console\Commands;

use App\Helpers\Embed;
use App\Models\Link;
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

    protected function addTaskVirusTotal(Link $link)
    {
        $client = new Client();
        $client->addServer(
            config('gearman.host'),
            config('gearman.port')
        );

        $client->doBackground('virus', serialize($link));
    }

    protected function virusTotal(Link $link)
    {
        $apiKey = ENV('VT_API_KEY', null);

        // if not api key OR blocked OR not active
        if (!$apiKey || $link->blocked || !$link->active)
        {
            return;
        }

        $post = [
            'apikey'   => $apiKey,
            'resource' => $link->url,
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.virustotal.com/vtapi/v2/url/report');
        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $queue = true;
        $result      = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ((int)$status_code === 200)
        {
            $data = JSON::decode($result);

            if (isset($data['scans'])) {
                $queue = false;

                foreach ($data['scans'] as $antiVirus => $mixed) {
                    $this->info('' . $antiVirus . ': ' . $mixed['result']);
                    if ($mixed['detected']) {
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
                $this->addTaskVirusTotal($link);
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

            CURLOPT_HTTPHEADER     => [
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

        $worker->addFunction('virus', function (\GearmanJob $job) use ($console) {
            /**
             * @var Link $model
             */
            $model = unserialize($job->workload(), []);
            $this->info('scan: ' . $model->url);
            $console->virusTotal($model);
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
                    Embed::read(
                        $model->url,
                        null,
                        $dispatcher
                    )
                );

                $console->info('metadata: ' . $model->parameters);
                $console->addTaskVirusTotal($model);

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
