<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/doctors', function(){
	$auth = auth('doctor');

	$credentials=[
		'email' => 'dokter@gmail.com',
		'password'	=>	'password',
	];

	if(auth()->guard('doctor')->attempt($credentials)){
		return "anda dokter bro";
	}

	return "gagal login";
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/', function () {
    	return view('welcome');
	});

    Route::get('/mod', [
    'uses'       => 'ModeratorController@index',
    'middleware' => 'role:moderator,admin',
	]);

	Route::get('/member', [
    'uses'       => 'MemberController@index',
    'middleware' => 'role:member',
	]);

	Route::get('/admin', [
    'uses'       => 'AdminController@index',
    'middleware' => 'role:admin',
	]);

});



