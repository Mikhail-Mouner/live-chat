<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @param  string|null  $redirectTo
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null, $redirectTo = '/login')
    {
        if (!Auth::guard($guard)->check())
            return redirect($redirectTo);

        Auth::shouldUse($guard);
        return $next($request);
    }
}
