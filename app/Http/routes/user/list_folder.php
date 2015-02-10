<?php

Route::get('list_folder', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ListFolderController@index',
	'as'			=> 'list_folder.index'
	]);
 

 Route::get('list_folder/list_arsip/{id}', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ListFolderController@list_arsip',
	'as'			=> 'list_folder.list_arsip'
	]);
 

 /* view child folder ID */
  Route::get('list_folder/child/{id}', [
	'middleware'	=> 'hanya_user',
	'uses'			=> 'Admin\ListFolderController@child',
	'as'			=> 'list_folder.child'
	]);
 