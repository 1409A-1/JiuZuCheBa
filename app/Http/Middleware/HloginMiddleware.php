<?php

namespace App\Http\Middleware;

use Closure;

class HloginMiddleware
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
        if ($request->session()->has('user_name')) {
            return $next($request);
            echo 1;
        }else
        {
            echo 2;
            return view('home.login.login');
        }

    }
}
