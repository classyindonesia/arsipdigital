<?php

Route::get('weblink', [
	'middleware'	=> 'hanya_web',
	'uses'			=> 'Admin\WeblinkController@index',
	'as'			=> 'admin_weblink.index'
	]);

 Route::get('weblink/kategori', [
	'middleware'	=> 'hanya_web',
	'uses'			=> 'Admin\WeblinkController@kategori',
	'as'			=> 'admin_weblink.kategori'
	]);

 