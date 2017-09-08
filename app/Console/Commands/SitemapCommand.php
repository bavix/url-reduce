<?php

namespace App\Console\Commands;

use App\Console\Commands\Providers\DNS;
use App\Console\Commands\Providers\Embed;
use App\Console\Commands\Providers\PhishTank;
use App\Console\Commands\Providers\PornEmbed;
use App\Console\Commands\Providers\Sitemap;
use App\Console\Commands\Providers\VirusTotal;
use App\Models\Tracker;
use Bavix\Gearman\Worker;
use Illuminate\Console\Command;

class SitemapCommand extends Command
{

    const TASK_SITE_MAP = 'siteMap';

    /**
     * @var Worker
     */
    protected $worker;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bx:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'bavix sitemap service';

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

        $this->worker()->addFunction(self::TASK_SITE_MAP, function (\GearmanJob $job) use ($console) {
            (new Sitemap($console, $job))->run();
        });

        while ($this->worker()->work())
        {
        }

        return;
    }

}
