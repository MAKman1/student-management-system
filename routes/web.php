<?php

Auth::routes();
//----------------------------LOGIN ROUTES AND CONTROLS----------------------------
Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
Route::post('/login/checklogin', 'Auth\LoginController@checklogin');




//----------------------------SYSADMIN ROUTES--------------------------------
Route::get('/sysadmin', 'AdminMainController@showDash')->middleware('adminauth');
Route::post('/sysadmin/logout', 'AdminMainController@logout')->middleware('adminauth');



//----------------------------NORMAL USER ROUTES----------------------------
Route::get('/sms/test', 'MainController@showTest')->middleware('userauth');


Route::get('/sms', 'MainController@showDash')->middleware('userauth');
Route::post('/sms', 'MainController@viewRenderer')->middleware('userauth');

Route::get('/sms/files/{filepath}/{filename}', 'MainController@retrieveFile')->middleware('userauth');

Route::post('/sms/uploadStudentImage', 'UploadController@uploadStudentImage')->middleware('userauth');
Route::post('/sms/logout', 'MainController@logout')->middleware('userauth');
Route::post('/sms/searchStudent', 'MainController@searchStudentWithGr')->middleware('userauth');






//----------------------------FRONTEND FOR WEBPAGE/ SCHOOL HOMEPAGE------------------------------
Route::view('/', 'homepage');
// Route::view('/home', 'home')->middleware('auth');
// Route::view('/admin', 'admin');
// Route::view('/writer', 'writer');
