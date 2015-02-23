<?php
Route::post('auth/login', [
	//'middleware'	=> 'auth',
	'uses'			=> 'Auth\LoginController@do_login',
	'as'			=> 'auth.do_login'
	]);

Route::get('auth/logout', [
	//'middleware'	=> 'auth',
	'uses'			=> 'Auth\LoginController@getLogout',
	'as'			=> 'auth.getLogout'
	]);