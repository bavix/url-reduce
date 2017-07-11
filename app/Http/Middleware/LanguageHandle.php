<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageHandle
{

    protected $languages = [];

    public function __construct()
    {
        $this->languages = bxCfg('bx.languages', ['en', 'ru']);
    }

    public function handle(Request $request, \Closure $next)
    {
        if (!Session::has('locale'))
        {
            Session::put('locale', $request->getPreferredLanguage($this->languages));
        }

        app()->setLocale(Session::get('locale'));

        return $next($request);
    }

}
