<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 

 

class EmailController extends Controller {
 
	public function __construct(){
		view()->share('emails_home', true);
	}


	public function index(){
		$view = 'konten.backend.emails.index';
		return view($view);
	}


	



}



