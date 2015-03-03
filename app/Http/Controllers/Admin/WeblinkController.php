<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 


 
class WeblinkController extends Controller {
 


 	public function __construct(){
 		view()->share('weblink_home', true);
 	}



 	public function index(){
 		$view = 'konten.backend.weblink.index';
 		return view($view);
 	}


 }