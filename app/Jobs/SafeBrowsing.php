<?php

namespace App\Jobs;

use App\Enums\QueueEnum;
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
        $this->queue = QueueEnum::SAFE_BROWSING;
        $this->link = $link;
    }

    /**
     * Execute the job.
     * @throws
     */
    public function handle(): void
    {
        $safeBrowsing = app(SafeBrowsingService::class);
        $unsafe = $safeBrowsing->searchUrl($this->link->url_direction);
        $message = $safeBrowsing->lookup($this->link->url_direction);
        $save = false;

        if ($unsafe) {
            $this->link->message = implode(', ', $unsafe);
            $this->link->blocked = 1;
        }

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
