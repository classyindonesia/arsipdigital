<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/* models */
use App\Models\Mst\User;
use App\Models\Mst\Rak;
use App\Models\Mst\Folder;

/* facade */
use Auth;

class HomeController extends Controller {
 
	public function __construct(){
		view()->share('dashboard_home', true);
	}



	public function index(){
		$jml_user 	= User::count();
		$jml_rak	= Rak::count();
		$jml_folder	= Folder::count();

		if(Auth::user()->ref_user_level_id == 1){
			$view = 'konten.backend.home.admin.index';
		}elseif(Auth::user()->ref_user_level_id == 2){
			$view = 'konten.backend.home.staff.index';			
		}else{
			$view = 'konten.backend.home.user.index';						
		}

 		return view($view,
 			compact('jml_user', 'jml_rak', 'jml_folder'));
	}

 
}
