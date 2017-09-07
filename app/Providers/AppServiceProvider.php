<?php

namespace App\Providers;

use App\Models\Link;
use App\Models\Report;
use App\Observers\LinkObserver;
use App\Observers\ReportObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Link::observe(LinkObserver::class);
        Report::observe(ReportObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
