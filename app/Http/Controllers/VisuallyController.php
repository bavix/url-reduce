<?php

namespace App\Http\Controllers;

use App\Models\AlbumModel;
use App\Models\CategoryModel;
use App\Models\NewModel;
use App\Models\PageModel;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;

class VisuallyController extends Controller
{

    /**
     * @param Request $request
     *
     * @return string
     */
    protected function refer(Request $request)
    {
        $refer = $request->server('HTTP_REFERER');
        $data = parse_url($refer);

        return $data['path'] ?? '/';
    }

    /**
     * @param Request $request
     *
     * @return ResponseTrait
     */
    public function index(Request $request)
    {
        return redirect($this->refer($request))
            ->withCookie('visually', !visually())
            ->withCookie('visuallyImage', visually() ? false : visuallyImage());
    }

    /**
     * @param Request $request
     *
     * @return ResponseTrait
     */
    public function image(Request $request)
    {
        return redirect($this->refer($request))
            ->withCookie('visuallyImage', !visuallyImage());
    }

}
