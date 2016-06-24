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

	Route::post('backend/album_galery/del', [
	 	'uses'			=> 'Admin\AlbumGaleryController@del',
		'as'			=> 'backend_album_galery.del'
		]);

	Route::get('backend/album_galery/edit/{id}', [
	 	'uses'			=> 'Admin\AlbumGaleryController@edit',
		'as'			=> 'backend_album_galery.edit'
		]);

	Route::post('backend/album_galery/update', [
	 	'uses'			=> 'Admin\AlbumGaleryController@update',
		'as'			=> 'backend_album_galery.update'
		]);


});


