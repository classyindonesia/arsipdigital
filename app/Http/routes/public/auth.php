<?php
Route::post('auth/login', [
	'uses'			=> 'Auth\LoginController@do_login',
	'as'			=> 'auth.do_login'
	]);

Route::get('auth/logout', [
	'uses'			=> 'Auth\LoginController@getLogout',
	'as'			=> 'auth.getLogout'
	]);