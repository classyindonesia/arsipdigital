<?php namespace App\Http\Controllers;

class HomeController extends Controller {
 




	public function index(){
 		return view('konten.backend.home.admin.index');
	}


	public function login(){
		return view('auth.login');
	}

}
