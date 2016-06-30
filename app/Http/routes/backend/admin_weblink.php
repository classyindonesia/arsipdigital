<?php

Route::get('weblink', [
	'uses'			=> 'WeblinkController@index',
	'as'			=> 'admin_weblink.index'
	]);





/* kelola weblink */
Route::get('weblink/add', [
	'uses'			=> 'WeblinkController@add',
	'as'			=> 'admin_weblink.add'
]);
Route::get('weblink/edit/{id}', [
	'uses'			=> 'WeblinkController@edit',
	'as'			=> 'admin_weblink.edit'
]);


Route::post('weblink/insert', [
	'uses'			=> 'WeblinkController@insert',
	'as'			=> 'admin_weblink.insert'
]);

Route::post('weblink/del', [
	'uses'			=> 'WeblinkController@del',
	'as'			=> 'admin_weblink.del'
]);

Route::post('weblink/update', [
	'uses'			=> 'WeblinkController@update',
	'as'			=> 'admin_weblink.update'
]);






/* kelola kategori weblink */

 Route::get('weblink/kategori', [
	'uses'			=> 'WeblinkController@kategori',
	'as'			=> 'admin_weblink.kategori'
	]);

  Route::get('weblink/add_kategori', [
	'uses'			=> 'WeblinkController@add_kategori',
	'as'			=> 'admin_weblink.add_kategori'
	]);

	Route::get('weblink/edit_kategori/{id}', [
		'uses'			=> 'WeblinkController@edit_kategori',
		'as'			=> 'admin_weblink.edit_kategori'
	]);

	Route::post('weblink/insert_kategori', [
		'uses'			=> 'WeblinkController@insert_kategori',
		'as'			=> 'admin_weblink.insert_kategori'
	]);


	Route::post('weblink/del_kategori', [
		'uses'			=> 'WeblinkController@del_kategori',
		'as'			=> 'admin_weblink.del_kategori'
	]);

	Route::post('weblink/update_kategori', [
		'uses'			=> 'WeblinkController@update_kategori',
		'as'			=> 'admin_weblink.update_kategori'
	]);
