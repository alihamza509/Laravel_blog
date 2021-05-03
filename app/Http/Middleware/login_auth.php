<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class login_auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('s_id')){
            return redirect('admin/login');
        }
        return $next($request);
    }
}
