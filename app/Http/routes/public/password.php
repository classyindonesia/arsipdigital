<?php

	// Route::controllers([
	// 	'password' => 'Auth\ResetPasswordsController',
	// ]);	
 
Route::get('password/email/{one?}/{two?}/{three?}/{four?}/{five?}',[
	'uses'	=> 'Auth\ResetPasswordsController@getEmail'
]);

Route::post('password/email/{one?}/{two?}/{three?}/{four?}/{five?}',[
	'uses'	=> 'Auth\ResetPasswordsController@postEmail'
]);


Route::get('password/reset/{one?}/{two?}/{three?}/{four?}/{five?}',[
	'uses'	=> 'Auth\ResetPasswordsController@getReset'
]);

Route::post('password/reset/{one?}/{two?}/{three?}/{four?}/{five?}',[
	'uses'	=> 'Auth\ResetPasswordsController@postReset'
]);

