<?php

Route::get('emails', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@index',
	'as'			=> 'emails.index'
	]);

Route::post('emails/del', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@del',
	'as'			=> 'emails.del'
	]);

Route::post('emails/insert_antrian', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@insert_antrian',
	'as'			=> 'emails.insert_antrian'
	]);


Route::post('emails/kirim_email', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@kirim_email',
	'as'			=> 'emails.kirim_email'
	]);

Route::get('emails/kirim', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@kirim',
	'as'			=> 'emails.kirim'
	]);

Route::get('emails/attach_file', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@attach_file',
	'as'			=> 'emails.attach_file'
	]);

Route::get('emails/add_attach', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@add_attach',
	'as'			=> 'emails.add_attach'
	]);
Route::post('emails/do_upload_file', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@do_upload_file',
	'as'			=> 'emails.do_upload_file'
	]);


Route::post('emails/clear_attach_file', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@clear_attach_file',
	'as'			=> 'emails.clear_attach_file'
	]);

Route::post('emails/del_file', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@del_file',
	'as'			=> 'emails.del_file'
	]);