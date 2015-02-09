<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/* models */
use App\Models\Mst\User;
use App\Models\Mst\Rak;
use App\Models\Mst\Folder;

class HomeController extends Controller {
 
	public function __construct(){
		view()->share('dashboard_home', true);
	}



	public function index(){
		$jml_user 	= User::count();
		$jml_rak	= Rak::count();
		$jml_folder	= Folder::count();
 		return view('konten.backend.home.admin.index',
 			compact('jml_user', 'jml_rak', 'jml_folder'));
	}

 
}
