<?php

Route::get('ref_status_pernikahan', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusPernikahanController@index',
	'as'			=> 'ref_status_pernikahan.index'
	]);

Route::get('ref_status_pernikahan/add', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusPernikahanController@add',
	'as'			=> 'ref_status_pernikahan.add'
	]);

Route::get('ref_status_pernikahan/edit/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusPernikahanController@edit',
	'as'			=> 'ref_status_pernikahan.edit'
	]);




Route::post('ref_status_pernikahan/insert', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusPernikahanController@insert',
	'as'			=> 'ref_status_pernikahan.insert'
	]);

Route::post('ref_status_pernikahan/update', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusPernikahanController@update',
	'as'			=> 'ref_status_pernikahan.update'
	]);

Route::post('ref_status_pernikahan/del', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefStatusPernikahanController@del',
	'as'			=> 'ref_status_pernikahan.del'
	]);
