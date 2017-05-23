<?php

namespace App\Http\Controllers;

use App\Models\LinkModel;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function mergeData()
    {
        return [
            'infoBlock' => LinkModel::query()
                ->where('active', 1)
                ->orderBy('id', 'desc')
                ->get()
        ];
    }
}
