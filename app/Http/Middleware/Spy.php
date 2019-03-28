<?php

namespace App\Http\Middleware;

use App\Services\TrackerService;
use Closure;

class Spy
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app(TrackerService::class)->hit();
        return $next($request);
    }

}
