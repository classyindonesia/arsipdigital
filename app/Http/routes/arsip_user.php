<?php

Route::get('arsip_user', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\ArsipUserController@index',
	'as'			=> 'arsip_user.index'
	]);

/* param=id mst_user table */
Route::get('arsip_user/list_arsip/{id}', [
	'middleware'	=> 'akses_ke_arsip_user',
	'uses'			=> 'Admin\ArsipUserController@list_arsip',
	'as'			=> 'arsip_user.list_arsip'
	]);


/* 
param:
	-id mst_user table 
	-mst_arsip_id
*/
Route::get('arsip_user/upload_file/{id}/{mst_arsip_id}', [
	'middleware'	=> 'akses_ke_arsip_user',
	'uses'			=> 'Admin\ArsipUserController@upload_file',
	'as'			=> 'arsip_user.upload_file'
	]);

Route::get('arsip_user/list_file_raw/{id}/{mst_arsip_id}', [
	'middleware'	=> 'akses_ke_arsip_user',
	'uses'			=> 'Admin\ArsipUserController@list_file_raw',
	'as'			=> 'arsip_user.list_file_raw'
	]);

Route::get('arsip_user/add_arsip/{id}', [
	'middleware'	=> 'akses_ke_arsip_user',
	'uses'			=> 'Admin\ArsipUserController@add',
	'as'			=> 'arsip_user.add'
	]);