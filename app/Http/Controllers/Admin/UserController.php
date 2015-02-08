<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class UserController extends Controller{


	public function __construct(){
		view()->share('users_home', true);
	}


	public function index(){
		return view('konten.backend.users.index');
	}

}