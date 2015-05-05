<?php
Route::group(['middleware' => ['auth', 'hanya_web']], function()
{
 
	Route::get('backend/menu', [
	 	'uses'			=> 'Admin\MenuController@index',
		'as'			=> 'backend_menu.index'
		]);


	Route::get('backend/menu/add', [
	 	'uses'			=> 'Admin\MenuController@add',
		'as'			=> 'backend_menu.add'
		]);

	Route::post('backend/menu/insert', [
	 	'uses'			=> 'Admin\MenuController@insert',
		'as'			=> 'backend_menu.insert'
		]);

  


});


