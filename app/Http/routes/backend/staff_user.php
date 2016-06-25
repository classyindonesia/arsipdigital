<?php 

Route::group(['middleware' => 'hanya_staff', 'namespace' => 'Admin'], function(){

	Route::get('staff_user', [
		'uses'			=> 'StaffUserController@index',
		'as'			=> 'backend_staff_user.index'
	]);


	Route::get('staff_user/do_export', [
		'uses'			=> 'StaffUserController@do_export',
		'as'			=> 'backend_staff_user.do_export'
	]);


	Route::get('staff_user/view_user_data/{mst_user_id}', [
		'uses'			=> 'StaffUserController@view_user_data',
		'as'			=> 'backend_staff_user.view_user_data'
	]);


});
