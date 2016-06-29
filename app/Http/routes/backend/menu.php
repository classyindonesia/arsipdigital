<?php
Route::group(['middleware' => 'hanya_web'], function()
{
 
	Route::get('backend/menu', [
	 	'uses'			=> 'Admin\MenuController@index',
		'as'			=> 'backend_menu.index'
		]);


	Route::get('backend/menu/add', [
	 	'uses'			=> 'Admin\MenuController@add',
		'as'			=> 'backend_menu.add'
		]);

	Route::get('backend/menu/edit/{id}', [
	 	'uses'			=> 'Admin\MenuController@edit',
		'as'			=> 'backend_menu.edit'
		]);

	Route::get('backend/menu/child/{id}', [
	 	'uses'			=> 'Admin\MenuController@child',
		'as'			=> 'backend_menu.child'
		]);


	Route::post('backend/menu/update', [
	 	'uses'			=> 'Admin\MenuController@update',
		'as'			=> 'backend_menu.update'
		]);

	Route::post('backend/menu/del', [
	 	'uses'			=> 'Admin\MenuController@del',
		'as'			=> 'backend_menu.del'
		]);


	Route::post('backend/menu/insert', [
	 	'uses'			=> 'Admin\MenuController@insert',
		'as'			=> 'backend_menu.insert'
		]);

  


});


