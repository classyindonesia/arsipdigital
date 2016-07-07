<?php
 
 
	Route::get('galery', [
	 	'uses'			=> 'GaleryController@index',
		'as'			=> 'backend_galery.index'
		]);


	Route::get('galery/upload', [
	 	'uses'			=> 'GaleryController@upload',
		'as'			=> 'backend_galery.upload'
		]);

	Route::post('galery/do_upload', [
	 	'uses'			=> 'GaleryController@do_upload',
		'as'			=> 'backend_galery.do_upload'
		]);

	Route::post('galery/del', [
	 	'uses'			=> 'GaleryController@del',
		'as'			=> 'backend_galery.del'
		]);

 