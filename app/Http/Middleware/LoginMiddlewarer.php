<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddlewarer
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
        if($request->session()->has('name')){
            return $next($request);
        }else{
            //echo 2;die;
            return redirect("admins");
        }
    }
}
