<?php
Route::group(['middleware' => 'hanya_web'], function()
{
 
	Route::get('backend/galery', [
	 	'uses'			=> 'Admin\GaleryController@index',
		'as'			=> 'backend_galery.index'
		]);


	Route::get('backend/galery/upload', [
	 	'uses'			=> 'Admin\GaleryController@upload',
		'as'			=> 'backend_galery.upload'
		]);

	Route::post('backend/galery/do_upload', [
	 	'uses'			=> 'Admin\GaleryController@do_upload',
		'as'			=> 'backend_galery.do_upload'
		]);

	Route::post('backend/galery/del', [
	 	'uses'			=> 'Admin\GaleryController@del',
		'as'			=> 'backend_galery.del'
		]);


});


