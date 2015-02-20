<?php

Route::get('berita/{slug}', [
	'uses'			=> 'Admin\BeritaController@public_berita',
	'as'			=> 'berita.public_berita'
	]);

