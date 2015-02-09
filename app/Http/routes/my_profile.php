<?php
Route::get('my_profile', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\MyProfileController@index',
	'as'			=> 'my_profile.index'
	]);
