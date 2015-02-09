<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MyProfileController extends Controller {
 

	public function __construct(){
		view()->share('my_profile', true);
	}

 	public function index(){
 		return view('konten.backend.my_profile.index');
 	}


 }