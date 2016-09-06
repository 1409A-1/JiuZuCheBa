<?php

namespace App\Http\Middleware;

use Closure;
//-----------------------前台的中间件验证非法登录的-------------------------------//
class HomeMiddleware
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
        } else {
           return redirect('login');
        }

    }
}
