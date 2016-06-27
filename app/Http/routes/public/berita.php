<?php
Route::group(['namespace' => 'Publik'], function(){

	Route::get('/{slug}', [
		'uses'			=> 'BeritaController@public_berita',
		'as'			=> 'berita.public_berita'
	]);


	Route::get('download_lampiran/{encrypted_id}', [
		'uses'			=> 'BeritaController@download_lampiran',
		'as'			=> 'berita.download_lampiran'
	]);

	Route::get('berita/daftar_berita', [
		'uses'			=> 'BeritaController@daftar_berita',
		'as'			=> 'berita.daftar_berita'
	]);


	Route::post('berita/search_berita', [
		'uses'			=> 'BeritaController@search_berita',
		'as'			=> 'berita.search_berita'
	]);


	Route::post('berita/submit_password_berita', [
		'uses'			=> 'BeritaController@submit_password_berita',
		'as'			=> 'berita.submit_password_berita'
	]);

	Route::post('berita/submit_lock_berita', [
		'uses'			=> 'BeritaController@submit_lock_berita',
		'as'			=> 'berita.submit_lock_berita'
	]);

});




