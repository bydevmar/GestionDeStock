<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class IsClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $re, Closure $next)
    {
        $isAdmin = Cookie::get("isAdmin");
        if($isAdmin && Cookie::get("who") && Hash::check(false ,$isAdmin) ){
            return $next($re);  
        }
        return back();
    }
}
