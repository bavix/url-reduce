<?php

namespace App\Observers;

use App\Models\Link;
use Bavix\Gearman\Client;

class LinkObserver
{

    public function created(Link $item)
    {
        if (class_exists(Client::class))
        {
            try
            {
                $client = new Client();
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
