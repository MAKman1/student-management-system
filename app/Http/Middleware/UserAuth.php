<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserAuth
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
        if( session()->has('singleLoginToken') && Auth::check() && (session()->get('singleLoginToken') == Auth::user()->singleLoginToken)){
            if( Auth::check() && Auth::user()->hasAnyRole( ['accountant', 'administration', 'admin', 'teacher', 'parent', 'student'])){
                return $next($request);
            }
            else if (Auth::check() && Auth::user()->hasRole( 'sysadmin')) {
                return redirect('/sysadmin'); //add message here
            }
            else{
                return redirect('/login'); //add message here
            }
        }
        else if(session()->has('singleLoginToken')){
            Auth::logout();
            return redirect('/login')->with( 'message', 'user already logged in on some other device');
        }
        else{
            Auth::logout();
            return redirect('/login')->with( 'message', 'error while logging you in, please try again');
        }
    }
}
