<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Traits\Utils;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use Utils;
    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    function showLogin(){
        return view('auth.loginpage');
    }

    

    function checkLogin( Request $request){
        $this->validate($request, [
            'username'     =>      'required|alphaNum',
            'password'  =>      'required|alphaNum|min:1'
        ]);

        $user_data = array(
            'username'  => $request->get('username'),
            'password' => $request->get('password')
        );
        if(Auth::attempt($user_data)){ //, $request->get('remember')

            Auth::user()->authorizeRoles(['accountant', 'administration', 'admin', 'sysadmin', 'teacher', 'parent', 'student']);

            //storing the session key
            $loginToken = $this->randomStringKey();
            echo $loginToken;
            $currentUser = Auth::user();
            $currentUser->singleLoginToken = $loginToken;
            $currentUser->save();

            session()->put('singleLoginToken', $loginToken);


            if (Auth::check() && Auth::user()->hasRole( 'sysadmin')) {
                return redirect('/sysadmin');
            }
            elseif (Auth::check() && Auth::user()->hasAnyRole( ['accountant', 'administration', 'admin', 'teacher', 'parent', 'student'])) {
                return redirect('/sms');
            }
            else {
                return redirect('/login');
            }
        }
        else{
            return back()->with('error', 'Invalid Login Details');
        }
    }
}
