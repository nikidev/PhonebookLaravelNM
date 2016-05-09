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
Route::get('user/delete/{id}','UserController@deleteUser');
Route::get('user/edit/{id}','UserController@viewEditUser');
Route::put('user/update/{id}','UserController@userUpdate');
Route::get('user/create','UserController@viewCreateUser');
Route::post('user/store','UserController@userStore');

Route::get('profile/edit/{id}','ProfileController@viewProfileEdit');
Route::put('profile/update/{id}','ProfileController@profileUpdate');

Route::get('groups','GroupController@viewGroupsList');
Route::get('group/create','GroupController@viewCreateGroup');
Route::post('group/store','GroupController@groupStore');
Route::get('group/delete/{id}','GroupController@deleteGroup');
Route::get('group/edit/{id}','GroupController@viewEditGroup');
Route::put('group/update/{id}','GroupController@groupUpdate');


Route::get('contacts/{phoneID}','OtherContactsController@viewContactsList');
Route::get('contact/create','OtherContactsController@viewCreateContact');
Route::post('contact/store','OtherContactsController@contactStore');
Route::get('contact/delete/{id}','OtherContactsController@deleteContact');
Route::get('contact/edit/{id}','OtherContactsController@viewEditContact');
Route::put('contact/update/{id}','OtherContactsController@contactUpdate');



Route::get('services','ServiceController@viewServicesList');
Route::get('service/create','ServiceController@viewCreateService');
Route::post('service/store','ServiceController@serviceStore');
Route::get('service/delete/{id}','ServiceController@deleteService');
Route::get('service/edit/{id}','ServiceController@viewEditService');
Route::put('service/update/{id}','ServiceController@serviceUpdate');




