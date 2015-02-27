<?php

Route::get('config', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\ConfigController@index',
	'as'			=> 'config.index'
	]);

Route::post('config/update_value', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\ConfigController@update_value',
	'as'			=> 'config.update_value'
	]);