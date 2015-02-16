<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;



class ArsipUserController extends Controller{

	public function __construct(){
		view()->share('arsip_user_home', true);
	}


	public function index(){
		return view('konten.backend.arsip_user.index');
	}




}