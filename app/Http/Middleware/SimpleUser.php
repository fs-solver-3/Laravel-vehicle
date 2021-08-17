<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Active as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class SimpleUser
{
    public function handle($request, Closure $next)
    {
        // return route('home', app()->getLocale());
        if (Auth::user() && Auth::user()->role()->where('title', 'Administrator')->count() > 0) {
            return redirect('/');
        }
        else{
            return $next($request);
        }
    }
}