<?php


Route::get('galery', [
	'uses'			=> 'Publik\GaleryController@index',
	'as'			=> 'galery.index'
	]);

Route::get('galery/images/{mst_album_galery_id}', [
	'uses'			=> 'Publik\GaleryController@images',
	'as'			=> 'galery.images'
	]);


Route::get('galery/image/{id}', [
	'uses'			=> 'Publik\GaleryController@image',
	'as'			=> 'galery.image'
	]);
