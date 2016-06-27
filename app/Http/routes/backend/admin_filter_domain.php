<?php 

Route::group(['middleware' => 'hanya_admin', 'namespace' => 'Admin'], function(){

	Route::get('filter_domain_registrasi',[
		'as'	=> 'backend.filter_domain.index',
		'uses'	=> 'FilterDomainController@index'
	]);

	Route::get('filter_domain_registrasi/add',[
		'as'	=> 'backend.filter_domain.add',
		'uses'	=> 'FilterDomainController@add'
	]);

	Route::post('filter_domain_registrasi/insert',[
		'as'	=> 'backend.filter_domain.insert',
		'uses'	=> 'FilterDomainController@insert'
	]);	


	Route::get('filter_domain_registrasi/edit/{id}',[
		'as'	=> 'backend.filter_domain.edit',
		'uses'	=> 'FilterDomainController@edit'
	]);	

	Route::post('filter_domain_registrasi/update',[
		'as'	=> 'backend.filter_domain.update',
		'uses'	=> 'FilterDomainController@update'
	]);

	Route::post('filter_domain_registrasi/delete',[
		'as'	=> 'backend.filter_domain.delete',
		'uses'	=> 'FilterDomainController@delete'
	]);

});
