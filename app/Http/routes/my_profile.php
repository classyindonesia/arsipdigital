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

 
Route::get('my_profile/change_avatar', [
'middleware'	=> 'auth',
'uses'			=> 'Admin\MyProfileController@change_avatar',
'as'			=> 'my_profile.change_avatar'
]);

Route::post('my_profile/do_change_avatar', [
'middleware'	=> 'auth',
'uses'			=> 'Admin\MyProfileController@do_change_avatar',
'as'			=> 'my_profile.do_change_avatar'
]);


Route::get('my_profile/change_password', [
'middleware'	=> 'auth',
'uses'			=> 'Admin\MyProfileController@change_password',
'as'			=> 'my_profile.change_password'
]);

Route::post('my_profile/update_password', [
'middleware'	=> 'auth',
'uses'			=> 'Admin\MyProfileController@update_password',
'as'			=> 'my_profile.update_password'
]);