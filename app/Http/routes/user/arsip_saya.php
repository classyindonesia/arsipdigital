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

Route::get('my_archive/edit/{mst_arsip}', [
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


Route::get('my_archive/upload_file/{mst_arsip}', [
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



Route::get('my_archive/before_download/{id}', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\ArsipSayaController@before_download',
	'as'			=> 'my_archive.before_download'
	]);


Route::get('my_archive/download_file/{id}', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\ArsipSayaController@download_file',
	'as'			=> 'my_archive.download_file'
	]);


Route::get('my_archive/download_file_watermark/{id}', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\ArsipSayaController@download_file_watermark',
	'as'			=> 'my_archive.download_file_watermark'
	]);


Route::get('my_archive/view_file/{id}', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\ArsipSayaController@view_file',
	'as'			=> 'my_archive.view_file'
	]);

Route::get('my_archive/view_file_pdf/{id}', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\ArsipSayaController@view_file_pdf',
	'as'			=> 'my_archive.view_file_pdf'
	]);



Route::post('my_archive/submit_search', [
'middleware'	=> 'auth',
'uses'			=> 'Admin\ArsipController@submit_search',
'as'			=> 'my_archive.submit_search'
]);

