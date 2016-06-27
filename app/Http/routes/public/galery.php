<?php
Route::group(['middleware' => ['akses_galery_frontend']], function()
{

	Route::get('galery', [
		'uses'			=> 'Publik\GaleryController@index',
		'as'			=> 'galery.index'
		]);

	Route::get('images/{mst_album_galery_id}', [
		'uses'			=> 'Publik\GaleryController@images',
		'as'			=> 'galery.images'
		]);


	Route::get('image/{id}', [
		'uses'			=> 'Publik\GaleryController@image',
		'as'			=> 'galery.image'
		]);

	Route::post('galery/submit_password_album', [
		'uses'			=> 'Publik\GaleryController@submit_password_album',
		'as'			=> 'galery.submit_password_album'
		]);

	Route::post('galery/submit_lock_album', [
		'uses'			=> 'Publik\GaleryController@submit_lock_album',
		'as'			=> 'galery.submit_lock_album'
		]);



});

