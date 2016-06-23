<?php 
Route::group(['middleware' => 'akses_registrasi_frontend'], function(){
	Route::get('register',[
		'as' => 'frontend_register.index',
		'uses'	=> 'Publik\RegisterController@index'
	]);

	Route::post('register',[
		'as' => 'frontend_register.submit_register',
		'uses'	=> 'Publik\RegisterController@submit_register'
	]);

	Route::get('register/aktivasi/{token}',[
		'as' => 'frontend_register.aktivasi',
		'uses'	=> 'Publik\RegisterController@aktivasi'
	]);

	Route::post('register/submit_aktivasi',[
		'as' => 'frontend_register.submit_aktivasi',
		'uses'	=> 'Publik\RegisterController@submit_aktivasi'
	]);
});
