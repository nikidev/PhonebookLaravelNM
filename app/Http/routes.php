<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
		return view('welcome');
	});

Route::get('/', function () {
		if (Auth::check()) {
			return redirect('/home');
		} else {
			return view('auth.login');
		}
	});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('phone/list', 'PhoneController@viewPhoneList');
Route::get('phone/create','PhoneController@viewCreatePhone');
Route::post('phone/store','PhoneController@phoneStore');
Route::get('phone/delete/{id}','PhoneController@deletePhone');
Route::get('phone/edit/{id}','PhoneController@viewEditPhone');
Route::put('phone/update/{id}','PhoneController@phoneUpdate');

//Route::resource('phone', 'PhoneController');


Route::get('users', 'UserController@viewUsersList');