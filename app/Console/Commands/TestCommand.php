<?php

namespace App\Console\Commands;

use App\Jobs\PhishTank;
use App\Models\Link;
use Illuminate\Console\Command;

class TestCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Command';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $vt = new PhishTank(Link::find(26));
        $vt->handle();
    }

}
