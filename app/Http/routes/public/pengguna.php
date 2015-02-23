<?php

Route::get('pengguna', [
	'uses'			=> 'Publik\PenggunaController@index',
	'as'			=> 'pengguna.index'
	]);


Route::get('pengguna/search', [
	'uses'			=> 'Publik\PenggunaController@search',
	'as'			=> 'pengguna.search'
	]);

Route::post('pengguna/submit_search', [
	'uses'			=> 'Publik\PenggunaController@submit_search',
	'as'			=> 'pengguna.submit_search'
	]);


Route::get('pengguna/detail/{encrypted_id}', [
	'uses'			=> 'Publik\PenggunaController@detail',
	'as'			=> 'pengguna.detail'
	]);
