<?php

namespace App\Console\Commands;

use App\Console\Commands\Providers\DNS;
use App\Console\Commands\Providers\Embed;
use App\Console\Commands\Providers\PhishTank;
use App\Console\Commands\Providers\PornEmbed;
use App\Console\Commands\Providers\VirusTotal;
use App\Models\Tracker;
use Bavix\Gearman\Worker;
use Illuminate\Console\Command;

class GearmanCommand extends Command
{

    const TASK_TRACKER = 'tracker';
    const TASK_EMBED   = 'embed';
    const TASK_VIRUS   = 'virus';
    const TASK_PORN    = 'porn';
    const TASK_DNS     = 'dns';

    /**
     * @var Worker
     */
    protected $worker;

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
    protected $description = 'bavix gearman service';

    /**
     * @return Worker
     */
    protected function worker(): Worker
    {
        if (!$this->worker)
        {
            $this->worker = new Worker();
            $this->worker->addServer(
                config('gearman.host'),
                config('gearman.port')
            );
        }

        return $this->worker;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $console = $this;

        $this->worker()->addFunction(self::TASK_TRACKER, function (\GearmanJob $job) use ($console) {
            /**
             * @var Tracker $model
             */
            $workload = $job->workload();
            $model    = unserialize($workload, []);
            $console->info('New visitor ' . $model->created_at . '; URL: ' . $model->url . '; IP: ' . $model->ip);
            $model->save();
        });

        $this->worker()->addFunction(self::TASK_EMBED, function (\GearmanJob $job) use ($console) {
            (new Embed($console, $job))->run();
        });

        $this->worker()->addFunction(self::TASK_VIRUS, function (\GearmanJob $job) use ($console) {
            (new PhishTank($console, $job))->run();
            (new VirusTotal($console, $job))->run();
        });

        $this->worker()->addFunction(self::TASK_PORN, function (\GearmanJob $job) use ($console) {
            (new PornEmbed($console, $job))->run();
        });

        $this->worker()->addFunction(self::TASK_DNS, function (\GearmanJob $job) use ($console) {
            (new DNS($console, $job))->run();
        });

        while ($this->worker()->work())
        {
        }

        return;
    }

}
