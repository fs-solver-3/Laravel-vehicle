<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Active as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class Active
{
    public function handle($request, Closure $next)
    {
        // return route('home', app()->getLocale());
        if (!(Auth::user()->active)){
            return redirect()->route('home', app()->getLocale());
        }
        else{
            return $next($request);
        }
    }
}