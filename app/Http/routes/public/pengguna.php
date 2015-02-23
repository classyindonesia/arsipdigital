<?php

Route::get('pengguna', [
	'uses'			=> 'Publik\PenggunaController@index',
	'as'			=> 'pengguna.index'
	]);