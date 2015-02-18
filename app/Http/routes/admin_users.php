<?php

Route::get('users', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@index',
	'as'			=> 'users.index'
	]);

Route::get('users/add', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@add',
	'as'			=> 'users.add'
	]);

Route::post('users/insert', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@insert',
	'as'			=> 'users.insert'
	]);

Route::get('users/edit/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@edit',
	'as'			=> 'users.edit'
	]);

Route::post('users/update', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@update',
	'as'			=> 'users.update'
	]);

Route::post('users/del', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@del',
	'as'			=> 'users.del'
	]);


Route::get('users/import', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@import',
	'as'			=> 'users.import'
	]);

Route::post('users/do_import', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@do_import',
	'as'			=> 'users.do_import'
	]);

Route::get('users/export', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@export',
	'as'			=> 'users.export'
	]);

Route::post('users/submit_search', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@submit_search',
	'as'			=> 'users.submit_search'
	]);


/* show data_user by its ID */
Route::get('users/show/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@show',
	'as'			=> 'users.show'
	]);

Route::post('users/reset_password', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\UserController@reset_password',
	'as'			=> 'users.reset_password'
	]);

