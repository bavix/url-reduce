<?php

namespace App\Http\Controllers;

use App\Models\LinkModel;
use App\Models\PageModel;
use App\Models\PollModel;
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
                ->limit(5)
                ->get(),
            'pages' => PageModel::query()
                ->where('active', 1)
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get(),
            'polls' => PollModel::query()
                ->where('active', 1)
                ->orderBy('id', 'desc')
                ->limit(5)
                ->get()
        ];
    }
}
