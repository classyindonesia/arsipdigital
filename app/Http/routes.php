<?php

use App\Models\Mst\Berita;
 
Route::get('/', function(){
		$berita = Berita::orderBy('id', 'DESC')->whereIsPublished(1)->take(8)->get();
		return view('konten.frontend.auth.login.index', compact('berita'));
});


 Route::group(['prefix' => 'backend'], function(){

	require app_path('Http/routes/admin_home.php');
	require app_path('Http/routes/admin_users.php');
	require app_path('Http/routes/admin_rak.php');
	require app_path('Http/routes/admin_folder.php');
	require app_path('Http/routes/admin_data_ref.php');
	require app_path('Http/routes/ref/agama.php');
	require app_path('Http/routes/ref/homebase.php');
	require app_path('Http/routes/ref/status_pernikahan.php');
	require app_path('Http/routes/ref/kota.php');
	require app_path('Http/routes/ref/status_ikatan.php');
	require app_path('Http/routes/my_profile.php');
	require app_path('Http/routes/rak_user.php');
	require app_path('Http/routes/arsip.php');
	require app_path('Http/routes/staff_akses.php');
	require app_path('Http/routes/admin_email.php');
	require app_path('Http/routes/admin_config.php');

	/* level web */
	require app_path('Http/routes/admin_weblink.php');
	require app_path('Http/routes/admin_foto_slide.php');
	require app_path('Http/routes/galery.php');
	require app_path('Http/routes/album_galery.php');
	require app_path('Http/routes/menu.php');


	/*hanya utk level staff */
	require app_path('Http/routes/arsip_user.php');
	require app_path('Http/routes/berita.php');
	require app_path('Http/routes/lampiran_berita.php');

	/* hanya utk user */
	require app_path('Http/routes/user/arsip_saya.php');
	require app_path('Http/routes/user/list_folder.php');

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

