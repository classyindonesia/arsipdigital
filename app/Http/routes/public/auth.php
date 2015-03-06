<?php
Route::post('auth/login', [
	'uses'			=> 'Auth\LoginController@do_login',
	'as'			=> 'auth.do_login'
	]);

Route::get('auth/login', [
	'uses'			=> 'Auth\LoginController@login',
	'as'			=> 'auth.login'
	]);

Route::get('auth/logout', [
	'uses'			=> 'Auth\LoginController@getLogout',
	'as'			=> 'auth.getLogout'
	]);