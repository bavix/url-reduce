<?php

namespace App\Observers;

use App\Models\Link;

class LinkObserver
{

    public function created(Link $item)
    {
        if (class_exists(\GearmanClient::class))
        {
            try
            {
                $client = new \GearmanClient();
                $client->addServer(
                    config('gearman.host'),
                    config('gearman.port')
                );

                $client->doBackground('metadata', serialize($item));
            }
            catch (\Throwable $throwable)
            {
            }
        }
    }

}
