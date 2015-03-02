<?php

Route::get('daftar_file', [
	'uses'			=> 'Publik\FileController@index',
	'as'			=> 'daftar_file.index'
	]);