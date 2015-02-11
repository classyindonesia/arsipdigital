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


Route::get('my_archive/upload_file/{id}', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@upload_file',
	'as'			=> 'my_archive.upload_file'
	]);

Route::post('my_archive/do_upload_file/{id}', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@do_upload_file',
	'as'			=> 'my_archive.do_upload_file'
	]);


Route::post('my_archive/hapus_file', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@hapus_file',
	'as'			=> 'my_archive.hapus_file'
	]);

Route::get('my_archive/list_file_raw/{id}', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ArsipSayaController@list_file_raw',
	'as'			=> 'my_archive.list_file_raw'
	]);