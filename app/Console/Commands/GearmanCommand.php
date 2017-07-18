<?php

namespace App\Console\Commands;

use App\Helpers\Embed;
use App\Models\Link;
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
    protected $description = 'Mozilla/5.0 (compatible; bavix/metabot-v2.1; +https://bavix.ru/bot.html)';

    /**
     * GearmanCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
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
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_ENCODING       => '',
            CURLOPT_AUTOREFERER    => true,
            CURLOPT_USERAGENT      => $this->description,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4,
        ]);

        $worker = new \GearmanWorker();
        $worker->addServer(
            config('gearman.host'),
            config('gearman.port')
        );

        $worker->addFunction('metadata', function (\GearmanJob $job) use ($console, $dispatcher)
        {
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

            }
            catch (\Throwable $throwable)
            {
                $console->info('fatal error: ' . $throwable->getMessage());
                $model->active = 0;
            }

            $model->save();
        });

        while ($worker->work())
        {
        }

        return;
    }

}
