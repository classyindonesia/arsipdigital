<?php

Route::get('data_ref', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\DataRefController@index',
	'as'			=> 'data_ref.index'
	]);

