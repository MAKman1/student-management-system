<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuth
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
        
        if (Auth::check() && Auth::user()->hasRole( 'sysadmin')) {
            return $next($request);
        }
        else if ( Auth::check() && Auth::user()->hasAnyRole( ['accountant', 'administration', 'admin', 'teacher', 'parent', 'student'])) {
            return redirect('/sms'); //add message here
        }
        else{
            return redirect('/login'); //add message here
        }
        // if(auth()->check()) {
        //     if (auth()->user()->authorizeRoles(['accountant', 'administration', 'admin', 'sysadmin', 'teacher', 'parent', 'student'])){
        //         return $next($request);
        //     }
        //     else {
        //         return route('login');
        //     }
        // }
        // else{
        //     return route('login');
        // }
    }
}
