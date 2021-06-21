<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class IsAdminMiddleware
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
        $isAdmin =  Cookie::get("isAdmin");
        if($isAdmin && Hash::check(true ,$isAdmin) && Cookie::get("who")){
            return $next($re);  
        }
        
        return back();
    }
}
