<?php


	Route::get('pengguna', [
		'middleware'	=> 'akses_pencarian_publik',
		'uses'			=> 'Publik\PenggunaController@index',
		'as'			=> 'pengguna.index'
		]);


	Route::get('pengguna/search', [
		'uses'			=> 'Publik\PenggunaController@search',
		'as'			=> 'pengguna.search'
		]);

	Route::post('pengguna/submit_search', [
		'middleware'	=> 'akses_pencarian_publik',		
		'uses'			=> 'Publik\PenggunaController@submit_search',
		'as'			=> 'pengguna.submit_search'
		]);


	Route::get('pengguna/detail/{encrypted_id}', [
		'middleware'	=> 'akses_pencarian_publik',
		'uses'			=> 'Publik\PenggunaController@detail',
		'as'			=> 'pengguna.detail'
		]);
