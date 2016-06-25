<?php
Route::group(['prefix' => 'my_archive', 'namespace' => 'Admin'], function(){

	Route::group(['middleware' => 'hanya_user'], function(){
		Route::get('/', [
				'uses'			=> 'ArsipSayaController@index',
				'as'			=> 'my_archive.index'
		]);

		Route::get('add', [
				'uses'			=> 'ArsipSayaController@add',
				'as'			=> 'my_archive.add'
		]);

		Route::get('edit/{mst_arsip}', [
				'uses'			=> 'ArsipSayaController@edit',
				'as'			=> 'my_archive.edit'
		]);

		Route::post('insert', [
				'uses'			=> 'ArsipSayaController@insert',
				'as'			=> 'my_archive.insert'
		]);

		Route::post('update', [
			'middleware'	=> 'hanya_user',
			'uses'			=> 'ArsipSayaController@update',
			'as'			=> 'my_archive.update'
		]);

		Route::post('del', [
			'uses'			=> 'ArsipSayaController@del',
			'as'			=> 'my_archive.del'
		]);


		Route::get('upload_file/{mst_arsip}', [
			'uses'			=> 'ArsipSayaController@upload_file',
			'as'			=> 'my_archive.upload_file'
		]);

		Route::post('do_upload_file/{id}', [
			'uses'			=> 'ArsipSayaController@do_upload_file',
			'as'			=> 'my_archive.do_upload_file'
		]);


		Route::post('hapus_file', [
			'uses'			=> 'ArsipSayaController@hapus_file',
			'as'			=> 'my_archive.hapus_file'
		]);

		Route::get('list_file_raw/{id}', [
			'uses'			=> 'ArsipSayaController@list_file_raw',
			'as'			=> 'my_archive.list_file_raw'
		]);
	});

	Route::group(['middleware' => 'auth'], function(){
		Route::get('before_download/{id}', [
			'uses'			=> 'ArsipSayaController@before_download',
			'as'			=> 'my_archive.before_download'
		]);

		Route::get('download_file/{id}', [
			'uses'			=> 'ArsipSayaController@download_file',
			'as'			=> 'my_archive.download_file'
		]);

		Route::get('download_file_watermark/{id}', [
			'uses'			=> 'ArsipSayaController@download_file_watermark',
			'as'			=> 'my_archive.download_file_watermark'
		]);

		Route::get('view_file/{id}', [
			'uses'			=> 'ArsipSayaController@view_file',
			'as'			=> 'my_archive.view_file'
		]);

		Route::get('view_file_pdf/{id}', [
			'uses'			=> 'ArsipSayaController@view_file_pdf',
			'as'			=> 'my_archive.view_file_pdf'
		]);

		Route::post('submit_search', [
			'uses'			=> 'ArsipController@submit_search',
			'as'			=> 'my_archive.submit_search'
		]);

		Route::get('files/{mst_arsip_id}', [
			'uses'			=> 'ArsipSayaController@files',
			'as'			=> 'my_archive.files'
		]);

		Route::get('download_all_files/{mst_arsip_id}', [
			'uses'			=> 'ArsipSayaController@download_all_files',
			'as'			=> 'my_archive.download_all_files'
		]);


	});


});




