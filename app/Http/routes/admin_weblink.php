<?php

Route::get('weblink', [
	'middleware'	=> 'hanya_web',
	'uses'			=> 'Admin\WeblinkController@index',
	'as'			=> 'admin_weblink.index'
	]);

 