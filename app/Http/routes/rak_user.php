<?php
Route::get('rak_user', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\RakUserController@index',
	'as'			=> 'rak_user.index'
	]);

 