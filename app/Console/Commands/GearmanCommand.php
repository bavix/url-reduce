<?php

namespace App\Console\Commands;

use App\Models\ImageModel;
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
    protected $description = 'Gearman Image Cropper';

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

        $worker  = new \GearmanWorker();
        $worker->addServer(
            config('gearman.host'),
            config('gearman.port')
        );

        $worker->addFunction('crop', function (\GearmanJob $job) use ($console)
        {
            /**
             * @var ImageModel $model
             */
            $model = unserialize($job->workload(), []);

            $console->info('image #' . $model->id . ' is loaded');

            foreach ($model->cropList as $item)
            {
                $console->info('processing task:' . $item . '...');
                $model->{$item}();
            }
        });

        while ($worker->work()) {}
        return;
    }

}
