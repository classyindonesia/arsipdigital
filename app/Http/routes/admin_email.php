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