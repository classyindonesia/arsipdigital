<?php

Route::get('folders', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\FolderController@index',
	'as'			=> 'folders.index'
	]);


Route::get('folders/child/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\FolderController@child',
	'as'			=> 'folders.child'
	]);


Route::get('folders/add', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\FolderController@add',
	'as'			=> 'folders.add'
	]);

Route::post('folders/insert', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\FolderController@insert',
	'as'			=> 'folders.insert'
	]);


Route::get('folders/edit/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\FolderController@edit',
	'as'			=> 'folders.edit'
	]);


Route::post('folders/update', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\FolderController@update',
	'as'			=> 'folders.update'
	]);

Route::post('folders/del', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\FolderController@del',
	'as'			=> 'folders.del'
	]);