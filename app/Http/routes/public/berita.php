<?php

Route::get('berita/detail/{slug}', [
	'uses'			=> 'Publik\BeritaController@public_berita',
	'as'			=> 'berita.public_berita'
	]);


Route::get('berita/download_lampiran/{encrypted_id}', [
	'uses'			=> 'Publik\BeritaController@download_lampiran',
	'as'			=> 'berita.download_lampiran'
	]);

Route::get('berita/daftar_berita', [
	'uses'			=> 'Publik\BeritaController@daftar_berita',
	'as'			=> 'berita.daftar_berita'
	]);
