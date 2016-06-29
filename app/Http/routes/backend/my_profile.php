<?php

Route::group(['namespace' => 'Admin', 'prefix' => 'my_profile'], function(){

	Route::get('/', [
		'uses'			=> 'MyProfileController@index',
		'as'			=> 'my_profile.index'
	]);

	Route::post('update', [
		'uses'			=> 'MyProfileController@update',
		'as'			=> 'my_profile.update'
	]);
	 
	Route::get('change_avatar', [
		'uses'			=> 'MyProfileController@change_avatar',
		'as'			=> 'my_profile.change_avatar'
	]);

	Route::post('do_change_avatar', [
		'uses'			=> 'MyProfileController@do_change_avatar',
		'as'			=> 'my_profile.do_change_avatar'
	]);

	Route::get('change_password', [
		'uses'			=> 'MyProfileController@change_password',
		'as'			=> 'my_profile.change_password'
	]);

	Route::post('update_password', [
		'uses'			=> 'MyProfileController@update_password',
		'as'			=> 'my_profile.update_password'
	]);

	Route::get('export_profile_excel', [
		'uses'			=> 'MyProfileController@export_profile_excel',
		'as'			=> 'my_profile.export_profile_excel'
	]);

});
