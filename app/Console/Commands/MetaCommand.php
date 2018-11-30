<?php

namespace App\Console\Commands;

use App\Jobs\UpdateMetadata;
use App\Models\Link;
use Illuminate\Console\Command;

class MetaCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:meta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Links that do not have meta data are added to the queue again';

    /**
     * handler
     */
    public function handle(): void
    {
        $links = Link::query()
            ->whereNull('parameters')
            ->where('retry', '<', 5)
            ->where('active', true);

        $links->each(function (Link $link) {
            dispatch(new UpdateMetadata($link));
        });
    }

}
