<?php

Route::get('arsip_user', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\ArsipUserController@index',
	'as'			=> 'arsip_user.index'
	]);

/* param=id mst_user table */
Route::get('arsip_user/list_arsip/{mst_user_id}', [
	'middleware'	=> 'akses_ke_arsip_user',
	'uses'			=> 'Admin\ArsipUserController@list_arsip',
	'as'			=> 'arsip_user.list_arsip'
	]);

Route::get('arsip_user/send_to_email/{mst_user_id}/{mst_arsip_id}', [
	'middleware'	=> 'akses_ke_arsip_user',
	'uses'			=> 'Admin\ArsipUserController@send_to_email',
	'as'			=> 'arsip_user.send_to_email'
	]);

Route::post('arsip_user/do_send_to_email', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\ArsipUserController@do_send_to_email',
	'as'			=> 'arsip_user.do_send_to_email'
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
