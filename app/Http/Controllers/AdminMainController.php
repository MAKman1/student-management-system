<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminMainController extends Controller
{
    function showDash(){
        return view('admin.admindash');
    }
    function logout()
    {
        Auth::logout();
        $logoutMessage = 'Logged out successfully!';
        return redirect('login')->with( $logoutMessage);
        
    }
}
