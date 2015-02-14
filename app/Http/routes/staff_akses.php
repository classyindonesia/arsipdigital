<?php

Route::get('staff_akses', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\StaffAksesController@index',
	'as'			=> 'staff_akses.index'
	]);

Route::get('staff_akses/list_user/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\StaffAksesController@list_user',
	'as'			=> 'staff_akses.list_user'
	]);

Route::get('staff_akses/add_list_user/{id}', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\StaffAksesController@add_list_user',
	'as'			=> 'staff_akses.add_list_user'
	]);


Route::post('staff_akses/del_akses', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\StaffAksesController@del_akses',
	'as'			=> 'staff_akses.del_akses'
	]);

Route::post('staff_akses/update_akses', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\StaffAksesController@update_akses',
	'as'			=> 'staff_akses.update_akses'
	]);