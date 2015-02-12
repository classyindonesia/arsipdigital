<?php
Route::get('my_profile', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\MyProfileController@index',
	'as'			=> 'my_profile.index'
	]);

Route::post('my_profile/update', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\MyProfileController@update',
	'as'			=> 'my_profile.update'
	]);

 