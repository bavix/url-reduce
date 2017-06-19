<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\ResponseTrait;

class VisuallyController extends Controller
{

    protected $redirect;

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function redirect(Request $request)
    {
        if (!$this->redirect)
        {
            $this->redirect = redirect($this->refer($request));
        }

        return $this->redirect;
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

        return $this->redirect($request)
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
        return $this->redirect($request)
            ->withCookie('visuallyImage', !\visuallyImage());
    }

    public function font(Request $request, $size)
    {
        switch ($size) {
            case 24:
            case 27:
                break;
            default: $size = 20;
        }

        return $this->redirect($request)
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

        return $this->redirect($request)
            ->withCookie('visuallyColor', $color);
    }

}
