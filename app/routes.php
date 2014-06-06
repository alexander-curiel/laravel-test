<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::filter('before', function() {
	// Do stuff before every request to your application...
});

Route::filter('after', function() {
	// Do stuff after every request to your application...
});

Route::filter('csrf', function() {
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function() {
	if(Auth::guest()) return Redirect::to('login');
});
*/

Route::get('prueba', function() {
	$user = new User;

	$user->email = "prueba@prueba.com";
	$user->real_name = "Cuenta Prueba";
	$user->password = "prueba";

	$user->save();

	return "El usuario de prueba ha sido salvado a la base de datos";

});

//Route::get('users', 'UsersController@index');
//Route::controller('users','UsersController');

// RESTful controller
Route::resource('users','UsersController');

// Route::post(), Route::put(), Route::delete()

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

// Authentication
Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');


// Sample
Route::get('/', 'HomeController@showWelcome');

