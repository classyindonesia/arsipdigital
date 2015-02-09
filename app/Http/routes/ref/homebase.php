<?php

Route::get('ref_homebase', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefHomeBaseController@index',
	'as'			=> 'ref_homebase.index'
	]);

Route::get('ref_homebase/add', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefHomeBaseController@add',
	'as'			=> 'ref_homebase.add'
	]);

Route::get('ref_homebase/edit/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefHomeBaseController@edit',
	'as'			=> 'ref_homebase.edit'
	]);




Route::post('ref_homebase/insert', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefHomeBaseController@insert',
	'as'			=> 'ref_homebase.insert'
	]);

Route::post('ref_homebase/update', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefHomeBaseController@update',
	'as'			=> 'ref_homebase.update'
	]);

Route::post('ref_homebase/del', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\RefHomeBaseController@del',
	'as'			=> 'ref_homebase.del'
	]);
