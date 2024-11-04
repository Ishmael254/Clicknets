<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecheckUser
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
        if (auth()->check() && auth()->user()->login_expiry && now()->greaterThan(auth()->user()->login_expiry)) {
			$blocked_days = now()->diffInDays(auth()->user()->login_expiry); 
			$message = 'Hey, Its been '.$blocked_days.' '.Str::plural('day', $blocked_days).'. days !, Kindly Reward the admin with your visits since he is providing these services free of charge.';
            auth()->logout();   
			return redirect()->route('login')->withMessage($message); 
        }

        return $next($request);
    }

}
