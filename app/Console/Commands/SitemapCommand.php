<?php

namespace App\Console\Commands;

use App\Models\Link;
use Illuminate\Console\Command;

class SitemapCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a sitemap';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        request()->server->set('HTTPS', true);

        /**
         * @var $map \Laravelium\Sitemap\Sitemap
         */
        $map = app()->make('sitemap');
        $map->add(route('home'), null, '1.0', 'always');
        Link::live()->each(function (Link $link) use ($map) {
            $map->add(
                route('direct', ['hash' => $link->hash]),
                date('c', strtotime($link->updated_at)),
                .8 - ($link->isAdult() * .7),
                'weekly'
            );
        });

        $map->store();
    }

}
