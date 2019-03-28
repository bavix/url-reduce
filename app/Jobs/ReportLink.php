<?php

namespace App\Jobs;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReportLink implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Report
     */
    protected $report;

    /**
     * Create a new job instance.
     *
     * @param Report $report
     */
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    /**
     * Execute the job.
     * @throws
     */
    public function handle(): void
    {
        $link = $this->report->link;
        $link->reported_at = now();
        $link->save();

        dispatch_now(new UpdateMetadata($link));
        $this->report->checked = 1;
        $this->report->save();
    }

}
