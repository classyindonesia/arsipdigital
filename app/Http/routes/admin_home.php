<?php

Route::get('/', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\HomeController@index',
	'as'			=> 'home.index'
	]);
