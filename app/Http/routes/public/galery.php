<?php


	Route::get('galery', [
		'uses'			=> 'Publik\GaleryController@index',
		'as'			=> 'galery.index'
		]);
