<?php

Route::get('ref_status_ikatan', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusIkatanController@index',
	'as'			=> 'ref_status_ikatan.index'
	]);

Route::get('ref_status_ikatan/add', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusIkatanController@add',
	'as'			=> 'ref_status_ikatan.add'
	]);

Route::get('ref_status_ikatan/edit/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusIkatanController@edit',
	'as'			=> 'ref_status_ikatan.edit'
	]);




Route::post('ref_status_ikatan/insert', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusIkatanController@insert',
	'as'			=> 'ref_status_ikatan.insert'
	]);

Route::post('ref_status_ikatan/update', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusIkatanController@update',
	'as'			=> 'ref_status_ikatan.update'
	]);

Route::post('ref_status_ikatan/del', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusIkatanController@del',
	'as'			=> 'ref_status_ikatan.del'
	]);
