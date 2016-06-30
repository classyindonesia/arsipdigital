<?php
Route::group(['prefix' => 'menu'], function(){


	Route::get('/', [
	 	'uses'			=> 'MenuController@index',
		'as'			=> 'backend_menu.index'
		]);

	Route::get('add', [
	 	'uses'			=> 'MenuController@add',
		'as'			=> 'backend_menu.add'
		]);

	Route::get('edit/{id}', [
	 	'uses'			=> 'MenuController@edit',
		'as'			=> 'backend_menu.edit'
		]);

	Route::get('child/{id}', [
	 	'uses'			=> 'MenuController@child',
		'as'			=> 'backend_menu.child'
		]);


	Route::post('update', [
	 	'uses'			=> 'MenuController@update',
		'as'			=> 'backend_menu.update'
		]);

	Route::post('del', [
	 	'uses'			=> 'MenuController@del',
		'as'			=> 'backend_menu.del'
		]);


	Route::post('insert', [
	 	'uses'			=> 'MenuController@insert',
		'as'			=> 'backend_menu.insert'
		]);

});
 


  




