<?php 

Route::group(['middleware' => 'hanya_web', 'namespace' => 'Admin'], function(){

	Route::get('staff_user', [
		'uses'			=> 'StaffUserController@index',
		'as'			=> 'backend_staff_user.index'
	]);


});
