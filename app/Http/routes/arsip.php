<?php
/* hanya utk admin */

Route::get('arsip', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\ArsipController@index',
	'as'			=> 'arsip.index'
	]);

Route::get('arsip/upload_file/{mst_arsip}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\ArsipController@upload_file',
	'as'			=> 'arsip.upload_file'
	]);

Route::post('arsip/submit_search', [
'middleware'	=> 'hanya_admin',
'uses'			=> 'Admin\ArsipController@submit_search',
'as'			=> 'arsip.submit_search'
]);

