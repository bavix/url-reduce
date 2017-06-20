<?php

namespace App\Http\Controllers;

use Bavix\Helpers\JSON;
use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;

class VisuallyController extends Controller
{

    protected $mixed;

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function response(Request $request)
    {
        if (!$this->mixed)
        {
            $this->mixed = response(JSON::encode(['ok']));
        }

        return $this->mixed;
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    protected function refer(Request $request)
    {
        $refer = $request->server('HTTP_REFERER');
        $data = \parse_url($refer);

        return $data['path'] ?? '/';
    }

    /**
     * @param Request $request
     *
     * @return ResponseTrait
     */
    public function index(Request $request)
    {
        // reset font & color
        $this->font($request, null);
        $this->color($request, null);

        return $this->response($request)
            ->withCookie('visually', !\visually())
            ->withCookie('visuallyImage', \visually() ? false : \visuallyImage());
    }

    /**
     * @param Request $request
     *
     * @return ResponseTrait
     */
    public function image(Request $request)
    {
        return $this->response($request)
            ->withCookie('visuallyImage', !\visuallyImage());
    }

    public function font(Request $request, $size)
    {
        if ($size <= 14 || $size >= 29)
        {
            $size = 20;
        }

        return $this->response($request)
            ->withCookie('visuallyFont', $size);
    }

    public function color(Request $request, $color)
    {
        switch ($color) {
            case 'white-black':
            case 'dark-blue-blue':
            case 'brown-beige':
            case 'green-dark-brown':
                break;
            default: $color = 'black-white';
        }

        return $this->response($request)
            ->withCookie('visuallyColor', $color);
    }

}
