<?php

namespace App\Http\Middleware;
use App\Providers\RouteService;
use Closure;
use Illuminate\Http\Request;

class RedirectIfNotOwner
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
        if(!Auth::user()->role == 'owner'){
            return redirect(RouteService::HOME);
        }
        return $next($request);
    }
}
