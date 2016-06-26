<?php


 
Route::get('/', [
	'as'	=> 'frontend_home.index',
	'uses'	=> 'Publik\HomeController@index'
]);


 Route::group(['prefix' => 'backend'], function(){

	require app_path('Http/routes/backend/admin_home.php');
	require app_path('Http/routes/backend/admin_users.php');
	require app_path('Http/routes/backend/admin_rak.php');
	require app_path('Http/routes/backend/admin_folder.php');
	require app_path('Http/routes/backend/admin_data_ref.php');
	require app_path('Http/routes/backend/ref/agama.php');
	require app_path('Http/routes/backend/ref/homebase.php');
	require app_path('Http/routes/backend/ref/status_pernikahan.php');
	require app_path('Http/routes/backend/ref/kota.php');
	require app_path('Http/routes/backend/ref/status_ikatan.php');
	require app_path('Http/routes/backend/my_profile.php');
	require app_path('Http/routes/backend/rak_user.php');
	require app_path('Http/routes/backend/arsip.php');
	require app_path('Http/routes/backend/staff_akses.php');
	require app_path('Http/routes/backend/admin_email.php');
	require app_path('Http/routes/backend/admin_config.php');

	/* level web */
	require app_path('Http/routes/backend/admin_weblink.php');
	require app_path('Http/routes/backend/admin_foto_slide.php');
	require app_path('Http/routes/backend/galery.php');
	require app_path('Http/routes/backend/album_galery.php');
	require app_path('Http/routes/backend/menu.php');
	require app_path('Http/routes/backend/password.php');


	/*hanya utk level staff */
	require app_path('Http/routes/backend/arsip_user.php');
	require app_path('Http/routes/backend/berita.php');
	require app_path('Http/routes/backend/lampiran_berita.php');
	require app_path('Http/routes/backend/staff_user.php');

	/* hanya utk user */
	require app_path('Http/routes/backend/user/arsip_saya.php');
	require app_path('Http/routes/backend/user/list_folder.php');

 });
 

 	/* public */
	require app_path('Http/routes/public/auth.php');
	require app_path('Http/routes/public/pengguna.php');
	require app_path('Http/routes/public/password.php');
	
	
	require app_path('Http/routes/public/feed.php');
	require app_path('Http/routes/public/register.php');

	// ini juga root-path+1 segment
	require app_path('Http/routes/public/file.php');

	// route ini jg menggunakan root-path+1 segment
	require app_path('Http/routes/public/galery.php');

	// menggunakan root-path/{slug}, jadi harus ditempatkan yg paling bawah
	require app_path('Http/routes/public/berita.php');






