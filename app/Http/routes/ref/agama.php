<?php

Route::get('ref_agama', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefAgamaController@index',
	'as'			=> 'ref_agama.index'
	]);

Route::get('ref_agama/add', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefAgamaController@add',
	'as'			=> 'ref_agama.add'
	]);

Route::get('ref_agama/edit/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefAgamaController@edit',
	'as'			=> 'ref_agama.edit'
	]);




Route::post('ref_agama/insert', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefAgamaController@insert',
	'as'			=> 'ref_agama.insert'
	]);

Route::post('ref_agama/update', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefAgamaController@update',
	'as'			=> 'ref_agama.update'
	]);

Route::post('ref_agama/del', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefAgamaController@del',
	'as'			=> 'ref_agama.del'
	]);
