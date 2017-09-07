<?php

namespace App\Observers;

use Bavix\Gearman\Client;
use Illuminate\Database\Eloquent\Model;

abstract class Observer
{

    protected function addTask(string $name, Model $item)
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

                $client->doHighBackground($name, serialize($item));
            }
            catch (\Throwable $throwable)
            {
            }
        }
    }

}
