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

Route::get('/', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'HomeController@index',
	'as'			=> 'home.index'
	]);

/*Route::get('auth/login', [ 
	'uses' => 'HomeController@login']);
*/

//Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
