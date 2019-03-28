<?php

namespace App\Observers;

use App\Jobs\PhishTank;
use App\Jobs\UpdateMetadata;
use App\Jobs\VirusTotal;
use App\Models\Link;

class LinkObserver
{

    /**
     * @param Link $link
     */
    public function created(Link $link): void
    {
        dispatch(new UpdateMetadata($link));
        dispatch(new PhishTank($link));
        dispatch(new VirusTotal($link));
    }

}
