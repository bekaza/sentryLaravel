<?php
Route::when('*', 'csrf', ['POST', 'PUT', 'PATCH', 'DELETE']);
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
# Home
Route::get('/', array('as' => 'home', 'uses' => 'IndexController@home'))->before('guest');
Route::get('home',function(){return Redirect::route('home');});

# Authentication
Route::group(['before' => 'logged'], function()
{
	Route::get('login', ['as' => 'login_view', 'uses' => 'SessionsController@view']);
	Route::post('login', ['as' => 'login', 'uses' => 'SessionsController@store']);
});
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);

# Registration
Route::group(['before' => 'logged'], function()
{
	Route::get('register', 'RegistrationController@create');
	Route::post('register', ['as' => 'registration', 'uses' => 'RegistrationController@store']);
});

# Profile
Route::group(['before' => 'auth'], function()
{
	Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@show']);
	Route::get('profile/edit','UserController@edit');
	Route::resource('profiles','UserController',['only' => ['show','edit','update']]);
});