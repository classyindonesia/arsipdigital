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
