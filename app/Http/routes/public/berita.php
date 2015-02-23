<?php

Route::get('berita/{slug}', [
	'uses'			=> 'Publik\BeritaController@public_berita',
	'as'			=> 'berita.public_berita'
	]);


Route::get('berita/download_lampiran/{id}', [
	'uses'			=> 'Publik\BeritaController@download_lampiran',
	'as'			=> 'berita.download_lampiran'
	]);