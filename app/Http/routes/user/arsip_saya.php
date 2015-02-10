<?php

Route::get('my_archive', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@index',
	'as'			=> 'my_archive.index'
	]);


Route::get('my_archive/add', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@add',
	'as'			=> 'my_archive.add'
	]);

Route::get('my_archive/edit/{id}', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@edit',
	'as'			=> 'my_archive.edit'
	]);

Route::post('my_archive/insert', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@insert',
	'as'			=> 'my_archive.insert'
	]);

Route::post('my_archive/update', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@update',
	'as'			=> 'my_archive.update'
	]);

Route::post('my_archive/del', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@del',
	'as'			=> 'my_archive.del'
	]);
