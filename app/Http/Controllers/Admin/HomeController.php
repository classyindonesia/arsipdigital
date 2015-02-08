<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
 
	public function __construct(){
		view()->share('dashboard_home', true);
	}



	public function index(){
 		return view('konten.backend.home.admin.index');
	}

 
}
