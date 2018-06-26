<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }


    public function handle($request, Closure $next) {
      if(auth()->check() && auth()->user()->role == 1) {
dd(Auth::user());
      return $next($request);
    }
    // dd(Auth::user());

    return redirect('/');
    }


}
