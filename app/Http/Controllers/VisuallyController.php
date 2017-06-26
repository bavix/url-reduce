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
    protected function data(Request $request)
    {
        if (!$this->mixed)
        {
            if ($request->ajax())
            {
                $this->mixed = response(JSON::encode(['ok']));
            }
            else
            {
                $this->mixed = redirect($this->refer($request));
            }
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

        return $this->data($request)
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
        return $this->data($request)
            ->withCookie('visuallyImage', !\visuallyImage());
    }

    public function font(Request $request, $size)
    {
        if ($size <= 14 || $size >= 29)
        {
            $size = 20;
        }

        return $this->data($request)
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

        return $this->data($request)
            ->withCookie('visuallyColor', $color);
    }

}
