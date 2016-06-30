<?php
 
	Route::get('backend/album_galery', [
	 	'uses'			=> 'AlbumGaleryController@index',
		'as'			=> 'backend_album_galery.index'
		]);


	Route::get('backend/album_galery/add', [
	 	'uses'			=> 'AlbumGaleryController@add',
		'as'			=> 'backend_album_galery.add'
		]);

	Route::post('backend/album_galery/store', [
	 	'uses'			=> 'AlbumGaleryController@store',
		'as'			=> 'backend_album_galery.store'
		]);

	Route::post('backend/album_galery/del', [
	 	'uses'			=> 'AlbumGaleryController@del',
		'as'			=> 'backend_album_galery.del'
		]);

	Route::get('backend/album_galery/edit/{id}', [
	 	'uses'			=> 'AlbumGaleryController@edit',
		'as'			=> 'backend_album_galery.edit'
		]);

	Route::post('backend/album_galery/update', [
	 	'uses'			=> 'AlbumGaleryController@update',
		'as'			=> 'backend_album_galery.update'
		]);


 