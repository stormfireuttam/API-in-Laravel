<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class BasicAuth
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
        //This is HTTP BasicAuthentication without setting a user identifier cookie in the session
        if (Auth::onceBasic()) {
            return response()->json([
                'message' => 'Auth Failed',
            ],401);
        }
        else {
            return $next($request);
        }
    }
}
