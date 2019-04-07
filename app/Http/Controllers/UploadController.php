<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Storage;
use App\Traits\Utils;

class UploadController extends Controller
{
    use Utils;


    public function uploadStudentImage( Request $request) {
 
        // GET ALL THE INPUT DATA , $_GET,$_POST,$_FILES.
        $input = Input::all();
        
        // VALIDATION RULES
        $rules = array(
            'studentImage' => 'required|image|mimes:jpeg,png,jpg,PNG,JPG,JPEG|max:5200',
        );
        $messages = array(
            'required' => 'The :attribute field is required',
            'mimes' => 'Only .jpeg and .png are allowed',
            'max' => 'Size exceeds maximum limit of 5 mb',
        );
    
        $validation = Validator::make($input, $rules, $messages);
        if ($validation->fails()) {
            $notification = array(
                'msg' => 'Upload failed: ' . $validation->errors()->first(), 
                'alert-type' => 'error'
            );
            return back()->with( $notification);
        }
        
        
           $file = array_get($input,'studentImage');
           // SET UPLOAD PATH 
            $destinationPath = 'studentImages'; 
            // GET THE FILE EXTENSION
            $extension = $file->getClientOriginalExtension(); 
            // RENAME THE UPLOAD WITH RANDOM NUMBER 
            $fileName = $this->randomStringKey() . '.' . $extension; 
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 

            $upload_success = $file->storeAs( $destinationPath, $fileName);
        
        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE
        if ($upload_success) {
            $notification = array(
                'msg' => $upload_success,//'Image successfully uploaded!', 
                'alert-type' => 'success',
                'storagePath' => $upload_success,
            );
            return back()->with( $notification);
        } 
    }
}
