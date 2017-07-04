<?php

namespace App\Http\Controllers;

use App\Models\ImageModel;
use Illuminate\Http\Request;

class DebugController extends Controller
{

    public function index(Request $request)
    {
        foreach (ImageModel::all() as $model)
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

                    $client->doBackground('crop', serialize($model));
                }
                catch (\Throwable $throwable)
                {
                }

            }

        }

        return 'success';

    }

}
