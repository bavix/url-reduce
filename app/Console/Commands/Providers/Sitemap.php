<?php

namespace App\Console\Commands\Providers;

use App\Models\Link;
use GearmanJob as Job;
use Illuminate\Console\Command;

class Sitemap implements Runner
{

    protected $command;
    protected $job;

    public function __construct(Command $command, Job $job)
    {
        $this->command = $command;
        $this->job     = $job;
    }

    /**
     * @param $date
     *
     * @return false|string
     */
    protected function getLastModifiedDate($date)
    {
        return date('c', strtotime($date));
    }

    public function run()
    {
        $self = $this;

        // route
        request()->server->set('HTTPS', true);

        /**
         * @var $map \Roumen\Sitemap\Sitemap
         */
        $map = app()->make('sitemap');

        $this->command->info('Add home to sitemap.xml');
        // add items to the sitemap (url, date, priority, freq)
        $map->add(route('home'), null, '1.0', 'always');

        $this->command->info('Add terms to sitemap.xml');
        $map->add(route('shorter', ['hash' => 'terms']), null, '0.9', 'weekly');

        $links = Link::query()
            ->orderBy('id', 'desc')
            ->limit(10000);

        $links->chunk(1000, function ($rows) use ($self, $map) {

            /**
             * @var Link[] $rows
             */
            foreach ($rows as $link)
            {
                $this->command->info('Add shorter `' . $link->hash . '` to sitemap.xml');
                $map->add(
                    route('shorter', ['hash' => $link->hash]),
                    $self->getLastModifiedDate($link->updated_at),
                    '0.1',
                    'weekly'
                );
            }

        });

        $this->command->info('Store sitemap.xml');
        $map->store();
    }

}
