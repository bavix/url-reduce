<?php

namespace App\Console\Commands;

use App\Jobs\UpdateMetadata;
use App\Models\Link;
use Illuminate\Console\Command;

class MonthlyUpdateCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:month-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monthly update of metadata';

    /**
     * handler
     */
    public function handle(): void
    {
        $links = Link::query()
            ->where('updated_at', '<', now()->subMonth())
            ->where('active', true)
            ->limit(100);

        $links->each(function (Link $link) {
            dispatch(new UpdateMetadata($link));
        });
    }

}
