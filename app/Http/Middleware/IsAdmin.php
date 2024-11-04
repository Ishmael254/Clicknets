<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
        
    // }

    public function handle($request, Closure $next)
        {
            if (Auth::user() &&  Auth::user()->admin == 1) {
                return $next($request);
         }

            return redirect('/home');
        }
    
}
