<?php

namespace App\Http\Controllers;

use App\Models\ConfigModel;
use App\Models\CounterModel;
use App\Models\LinkModel;
use App\Models\PageModel;
use App\Models\PollModel;
use App\Models\TrackerModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var array
     */
    protected $cookies = [];

    /**
     * @param string $view
     * @param array  $data
     * @param array  $merge
     *
     * @return \Illuminate\Http\Response
     */
    public function render($view, $data = [], $merge = [])
    {
        $view = view($view, $data, $merge);

        $response = new \Illuminate\Http\Response($view);

        if (!empty($this->cookies))
        {
            foreach ($this->cookies as $cookie)
            {
                $response->withCookie($cookie);
            }
        }

        return $response;

    }

    /**
     * @param array ...$arguments
     */
    public function setCookie(...$arguments)
    {
        if (!isset($arguments[2]))
        {
            $arguments[2] = 365 * (24) * 60;
        }

        $this->cookies[] = \cookie(...$arguments);
    }

    /**
     * @return array
     */
    public function mergeData()
    {

        TrackerModel::hit();

        return [

            'links' => LinkModel::query()
                ->where('active', 1)
                ->orderBy('id', 'desc')
//                ->limit(5)
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
                ->get(),

            'cfg' => [ConfigModel::class, 'getValue'],

            'counters' => CounterModel::query()
                ->where('active', 1)
                ->get()

        ];
    }

}
