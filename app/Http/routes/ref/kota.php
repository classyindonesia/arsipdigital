<?php

Route::get('ref_kota', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefKotaController@index',
	'as'			=> 'ref_kota.index'
	]);

Route::get('ref_kota/add', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefKotaController@add',
	'as'			=> 'ref_kota.add'
	]);

Route::get('ref_kota/edit/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefKotaController@edit',
	'as'			=> 'ref_kota.edit'
	]);




Route::post('ref_kota/insert', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefKotaController@insert',
	'as'			=> 'ref_kota.insert'
	]);

Route::post('ref_kota/update', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefKotaController@update',
	'as'			=> 'ref_kota.update'
	]);

Route::post('ref_kota/del', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefKotaController@del',
	'as'			=> 'ref_kota.del'
	]);
