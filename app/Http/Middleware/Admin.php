<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        return $next($request);
//    }
    public function handle($request, Closure $next) {

        if (Auth::check() && Auth::user()->isAdmin() == 1) {
            return $next($request);
        }
        
        return redirect('/');
    }

}
