<?php

namespace App\Observers;

use App\Console\Commands\GearmanCommand;
use App\Models\Report;

class ReportObserver extends Observer
{

    public function created(Report $report)
    {
        $this->addTask(GearmanCommand::TASK_EMBED, $report->link);
        $report->checked = 1;
        $report->save();
    }

}
