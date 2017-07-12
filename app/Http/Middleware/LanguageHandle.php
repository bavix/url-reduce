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
        $locale = bx_cookie('locale', $request->getPreferredLanguage($this->languages));

        app()->setLocale($locale);

        return $next($request);
    }

}
