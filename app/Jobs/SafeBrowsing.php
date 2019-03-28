<?php

namespace App\Jobs;

use App\Models\Link;
use App\Services\SafeBrowsingService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SafeBrowsing implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Link
     */
    protected $link;

    /**
     * Create a new job instance.
     *
     * @param Link $link
     */
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * Execute the job.
     * @throws
     */
    public function handle(): void
    {
        $safeBrowsing = app(SafeBrowsingService::class);
        $message = $safeBrowsing->lookup($this->link->url_direction);
        $save = false;

        if ($message) {
            $this->link->message = $message;
            $this->link->blocked = 1;
            $save = true;
        }

        if ($safeBrowsing->adults($this->link->url_direction)) {
            $this->link->is_porn = 1;
            $save = true;
        }

        if ($save) {
            $this->link->save();
        }
    }

}
