<?php 
Route::group(['prefix' => 'visitors'], function(){

	Route::get('/',[
		'as'	=> 'backend.visitors.index',
		'uses'	=> 'VisitorController@index'
	]);

});