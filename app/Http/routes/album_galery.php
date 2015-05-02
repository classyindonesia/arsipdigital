<?php
Route::group(['middleware' => ['auth', 'hanya_web']], function()
{
 
	Route::get('backend/album_galery', [
	 	'uses'			=> 'Admin\AlbumGaleryController@index',
		'as'			=> 'backend_album_galery.index'
		]);


	Route::get('backend/album_galery/add', [
	 	'uses'			=> 'Admin\AlbumGaleryController@add',
		'as'			=> 'backend_album_galery.add'
		]);

	Route::post('backend/album_galery/store', [
	 	'uses'			=> 'Admin\AlbumGaleryController@store',
		'as'			=> 'backend_album_galery.store'
		]);



});


