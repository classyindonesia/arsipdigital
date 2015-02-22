<?php

Route::get('berita', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\BeritaController@index',
	'as'			=> 'admin_berita.index'
	]);


Route::get('berita/create', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\BeritaController@create',
	'as'			=> 'admin_berita.create'
	]);

Route::get('berita/edit/{id}', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\BeritaController@edit',
	'as'			=> 'admin_berita.edit'
	]);


Route::post('berita/insert', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\BeritaController@insert',
	'as'			=> 'admin_berita.insert'
	]);

Route::post('berita/update', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\BeritaController@update',
	'as'			=> 'admin_berita.update'
	]);

Route::post('berita/del', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\BeritaController@del',
	'as'			=> 'admin_berita.del'
	]);

Route::post('berita/submit_search', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\BeritaController@submit_search',
	'as'			=> 'admin_berita.submit_search'
	]);


Route::get('berita/add_lampiran/{id}', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\BeritaController@add_lampiran',
	'as'			=> 'admin_berita.add_lampiran'
	]);

 