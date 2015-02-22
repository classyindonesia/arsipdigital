<?php

Route::get('lampiran_berita', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\LampiranBeritaController@index',
	'as'			=> 'lampiran_berita.index'
	]);

Route::get('lampiran_berita/upload_file', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\LampiranBeritaController@upload_file',
	'as'			=> 'lampiran_berita.upload_file'
	]);

Route::post('lampiran_berita/do_upload_file', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\LampiranBeritaController@do_upload_file',
	'as'			=> 'lampiran_berita.do_upload_file'
	]);

Route::get('lampiran_berita/view_detil/{id}', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\LampiranBeritaController@view_detil',
	'as'			=> 'lampiran_berita.view_detil'
	]);

Route::post('lampiran_berita/del', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\LampiranBeritaController@del',
	'as'			=> 'lampiran_berita.del'
	]);

Route::get('lampiran_berita/download/{id}', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\LampiranBeritaController@download',
	'as'			=> 'lampiran_berita.download'
	]);
