<?php

namespace App\Console;

use App\Console\Commands\MetaCommand;
use App\Console\Commands\MonthlyUpdateCommand;
use App\Console\Commands\SitemapCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(MetaCommand::class)->hourly();
        $schedule->command(SitemapCommand::class)->weekly();
        $schedule->command(MonthlyUpdateCommand::class)->mondays();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

}
