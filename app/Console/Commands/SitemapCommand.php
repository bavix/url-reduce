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
     * @return mixed
     */
    public function handle()
    {
        request()->server->set('HTTPS', true);

        /**
         * @var $map \Roumen\Sitemap\Sitemap
         */
        $map = app()->make('sitemap');
        $map->add(route('home'), null, '1.0', 'always');
        $map->add(route('home') . '#report', null, '0.9', 'weekly');
        $map->add(route('shorter', ['hash' => 'terms']), null, '0.9', 'weekly');

        $links = Link::query()
            ->where('active', true)
            ->where('blocked', false)
            ->whereNotNull('parameters')
            ->orderBy('id', 'desc');

        $links->each(function (Link $link) use ($map) {
            $map->add(
                route('shorter', ['hash' => $link->hash]),
                date('c', strtotime($link->updated_at)),
                .7 - ($link->isAdult() * .6),
                'weekly'
            );
        });

        $map->store();
    }

}
