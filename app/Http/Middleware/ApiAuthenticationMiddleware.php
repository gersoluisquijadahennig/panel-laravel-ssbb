<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
       
        $authorizationHeader = $request->cookie('Authorization');
        $user = $request->cookie('X-User-ID');

        $response = Http::withHeaders([
            'Authorization' => $authorizationHeader,
            'X-User-ID' => $user,
        ])->post('http://apiloginlaravel.test/api/loginuser');

        if ($response->successful()) {
            return $next($request);
        }
        else{
            return redirect('/login');
        }
        

    }

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
