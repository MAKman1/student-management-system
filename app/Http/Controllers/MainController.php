<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Response;

class MainController extends Controller
{
    // public function __construct()
    // {
    //     //$this->middleware('userauth');
    // }

    function showDash( Request $request){
        //return view('user.userdash');
        if( Auth::check() && Auth::user()->hasAnyRole( ['accountant', 'administration', 'admin', 'teacher', 'parent', 'student'])){
            $currentUser = Auth::user();
            return view('user.userdash')->with( ['currentView' => 'Dashboard', 'currentUser' => $currentUser]);
        }
        else if (Auth::check() && Auth::user()->hasRole( 'sysadmin')) {
            return redirect('/sysadmin');
        }
        else{
            return redirect('/login');
        }
    }

    function showTest( Request $request){
        $currentUser = Auth::user();
        return view('user.forms.newstudent')->with( ['currentView' => 'Test', 'currentUser' => $currentUser]);
    }

    function logout( Request $request)
    {
        Auth::logout();
        session()->forget('singleLoginToken');
        $logoutMessage = 'Logged out successfully!';
        return redirect('/login')->with( $logoutMessage);
    }

    function retrieveFile( $filepath, $filename){

        $filename = $filepath . '/' . $filename;

        if (!Storage::exists($filename)) {
            return null;
        }

        $file = Storage::get( $filename);
        $type = Storage::mimeType( $filename);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
    
    function searchStudentWithGr( Request $request){

    }
    function viewRenderer( Request $request){
        $id = $request->id;

        $currentUser = Auth::user();
        switch ($id) {
            case 0:
                return view('user.forms.newstudent')->with( ['currentView' => 'Test', 'currentUser' => $currentUser]);
            case 1:
                return view('user.userdash')->with( ['currentView' => 'Test', 'currentUser' => $currentUser]);
            case 2:
                return redirect('temp')->with( ['currentView' => 'Test', 'currentUser' => $currentUser]);
            default:
                echo abort(404);
        }
    }
}
