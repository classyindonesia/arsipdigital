<?php
Route::group(['middleware' => ['auth', 'hanya_web']], function()
{
 
	Route::get('backend/galery', [
	 	'uses'			=> 'Admin\GaleryController@index',
		'as'			=> 'backend_galery.index'
		]);


});


