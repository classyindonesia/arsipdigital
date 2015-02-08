<?php

Route::get('folders', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\FolderController@index',
	'as'			=> 'folders.index'
	]);
