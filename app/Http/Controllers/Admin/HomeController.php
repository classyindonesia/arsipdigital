<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\User;

class HomeController extends Controller {
 
	public function __construct(){
		view()->share('dashboard_home', true);
	}



	public function index(){
		$jml_user = User::count();
 		return view('konten.backend.home.admin.index',
 			compact('jml_user'));
	}

 
}
