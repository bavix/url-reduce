<?php

namespace App\Observers;

use App\Console\Commands\GearmanCommand;
use App\Console\Commands\SitemapCommand;
use App\Models\Link;

class LinkObserver extends Observer
{

    public function created(Link $link)
    {
        $this->addTask(GearmanCommand::TASK_DNS, $link);
    }

}
