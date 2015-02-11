<?php
Route::get('rak_user', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\RakUserController@index',
	'as'			=> 'rak_user.index'
	]);

 Route::get('rak_user/list_folder/{id}', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\RakUserController@list_folder',
	'as'			=> 'rak_user.list_folder'
	]);

 