<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check() && Auth::user()->hasRole( 'sysadmin')) {
            return redirect('/sysadmin');
        }
        else if ( Auth::check() && Auth::user()->hasAnyRole( ['accountant', 'administration', 'admin', 'teacher', 'parent', 'student'])) {
            return redirect('/sms'); //add message here
        }
        else{
            return $next($request);
        }
        return $next($request);
    }
}
