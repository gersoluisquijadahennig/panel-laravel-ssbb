<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards)
    {
        dd($request->cookie('access_token'));
        if($token = $request->cookie('access_token')){

            $request->headers->set('Authorization', 'Bearer '.$token);
            dd( $request->headers->set('Authorization', 'Bearer '.$token));
        }

        return $next($request);
    }
}
