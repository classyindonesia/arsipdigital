<?php

Route::get('foto_slide', [
	'uses'			=> 'FotoSlideController@index',
	'as'			=> 'foto_slide.index'
	]);


Route::post('foto_slide/del', [
	'uses'			=> 'FotoSlideController@del',
	'as'			=> 'foto_slide.del'
	]);


Route::get('foto_slide/upload', [
	'uses'			=> 'FotoSlideController@upload',
	'as'			=> 'foto_slide.upload'
	]);

Route::post('foto_slide/do_upload', [
	'uses'			=> 'FotoSlideController@do_upload',
	'as'			=> 'foto_slide.do_upload'
	]);

Route::get('foto_slide/edit/{id}', [
	'uses'			=> 'FotoSlideController@edit',
	'as'			=> 'foto_slide.edit'
	]);


Route::post('foto_slide/update', [
	'uses'			=> 'FotoSlideController@update',
	'as'			=> 'foto_slide.update'
	]);

Route::post('foto_slide/do_update_foto', [
	'uses'			=> 'FotoSlideController@do_update_foto',
	'as'			=> 'foto_slide.do_update_foto'
	]);





/* kelola jabatan */
Route::get('foto_slide/jabatan', [
	'uses'			=> 'FotoSlideController@jabatan',
	'as'			=> 'foto_slide.jabatan'
	]);

Route::get('foto_slide/add_jabatan', [
	'uses'			=> 'FotoSlideController@add_jabatan',
	'as'			=> 'foto_slide.add_jabatan'
	]);

Route::post('foto_slide/insert_jabatan', [
	'uses'			=> 'FotoSlideController@insert_jabatan',
	'as'			=> 'foto_slide.insert_jabatan'
	]);

Route::post('foto_slide/update_jabatan', [
	'uses'			=> 'FotoSlideController@update_jabatan',
	'as'			=> 'foto_slide.update_jabatan'
	]);

Route::post('foto_slide/del_jabatan', [
	'uses'			=> 'FotoSlideController@del_jabatan',
	'as'			=> 'foto_slide.del_jabatan'
	]);

Route::get('foto_slide/edit_jabatan/{id}', [
	'uses'			=> 'FotoSlideController@edit_jabatan',
	'as'			=> 'foto_slide.edit_jabatan'
	]);
