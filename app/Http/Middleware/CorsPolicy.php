<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (env('DISABLE_CORS', true)) return $next($request);
        // $domainFrontend = config('cors.allowed_origins');
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*') //[ 'http://localhost:3000', 'http://127.0.1:3000']
            ->header('Access-Control-Allow-Methods', '*')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Allow-Headers', 'X-CSRF-Token');
    }
}
