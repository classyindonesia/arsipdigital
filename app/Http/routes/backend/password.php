<?php
Route::group(['middleware' => ['auth', 'hanya_web'], 'namespace' => 'Admin'], function(){

	Route::get('password_media', [
		'as'	=> 'backend_password.index',
		'uses'	=> 'PasswordMediaController@index'
	]);

	Route::get('password_media/add', [
		'as'	=> 'backend_password.add',
		'uses'	=> 'PasswordMediaController@add'
	]);
	
	Route::post('password_media/insert', [
		'as'	=> 'backend_password.insert',
		'uses'	=> 'PasswordMediaController@insert'
	]);


	Route::get('password_media/edit/{id}', [
		'as'	=> 'backend_password.edit',
		'uses'	=> 'PasswordMediaController@edit'
	]);


	Route::post('password_media/update', [
		'as'	=> 'backend_password.update',
		'uses'	=> 'PasswordMediaController@update'
	]);


	Route::post('password_media/delete', [
		'as'	=> 'backend_password.delete',
		'uses'	=> 'PasswordMediaController@delete'
	]);


});