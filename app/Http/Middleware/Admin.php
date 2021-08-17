<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; 

class Admin
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
        // if (Auth::check()) {

        //     if ((Auth::user()->role_id == 1) || (Auth::user()->role_id == 2) || (Auth::user()->role_id == 3)){

        //         return $next($request);
        //     }

        //     else{
        //         return redirect('/');
        //     }
        // }
        // else {
        //     return redirect('/');
        // }
        if (!Auth::check()) {
            return redirect('/');
        }
        if (Auth::user()->role()->where('title', 'Simple user')->count() > 0) {
            return redirect('/');
        }

        return $next($request);
    }
}
