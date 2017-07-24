<?php

namespace App\Http\Middleware;

use App\Models\GeoIP;
use Illuminate\Http\Request;

class LanguageHandle
{

    public function handle(Request $request, \Closure $next)
    {
        $locale = bx_cookie('locale', GeoIP::getLanguage());

        app()->setLocale($locale);

        return $next($request);
    }

}
