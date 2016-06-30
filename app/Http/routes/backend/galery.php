<?php
 
 
	Route::get('backend/galery', [
	 	'uses'			=> 'GaleryController@index',
		'as'			=> 'backend_galery.index'
		]);


	Route::get('backend/galery/upload', [
	 	'uses'			=> 'GaleryController@upload',
		'as'			=> 'backend_galery.upload'
		]);

	Route::post('backend/galery/do_upload', [
	 	'uses'			=> 'GaleryController@do_upload',
		'as'			=> 'backend_galery.do_upload'
		]);

	Route::post('backend/galery/del', [
	 	'uses'			=> 'GaleryController@del',
		'as'			=> 'backend_galery.del'
		]);

 