<?php

Route::get('/', [
	'uses'			=> 'Admin\HomeController@index',
	'as'			=> 'home.index'
	]);

