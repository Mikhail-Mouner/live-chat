<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {

        $destrnations = [
            'admin' => 'admin.home',
            'moderator' => 'moderator.home',
            'user' => RouteServiceProvider::HOME,
        ];

        if (Auth::guard($guard)->check())
            return redirect()->route($destrnations[Auth::user()->role]);


        return $next($request);
    }
}
