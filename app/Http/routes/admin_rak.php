<?php

Route::get('rak', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RakController@index',
	'as'			=> 'rak.index'
	]);



Route::get('rak/add', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RakController@add',
	'as'			=> 'rak.add'
	]);

Route::get('rak/edit/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RakController@edit',
	'as'			=> 'rak.edit'
	]);


Route::post('rak/insert', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RakController@insert',
	'as'			=> 'rak.insert'
	]);

Route::post('rak/update', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RakController@update',
	'as'			=> 'rak.update'
	]);
