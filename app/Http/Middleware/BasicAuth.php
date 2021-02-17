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

//Oauth is an open-standard authorization protocol or framework
//Oauth doesn't share password data but instead uses authorization tokens between consumers and service providers
//The examples of OAuth are Facebook and other authentications
/*
 * Step 1: You visit a website
 * Step 2: Join us using any of these service providers
 * Step 3: You are redirected to the selected service provider.
 * Step 4: You are given permission
 */
