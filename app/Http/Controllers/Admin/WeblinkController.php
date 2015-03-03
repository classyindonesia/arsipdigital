<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use App\Models\Mst\KategoriWeblink;

 
class WeblinkController extends Controller {
 


 	public function __construct(){
 		view()->share('weblink_home', true);
 	}



 	public function index(){
 		$view = 'konten.backend.weblink.index';
 		return view($view);
 	}





 	public function kategori(){
 		$kategori = KategoriWeblink::all();
 		$view = 'konten.backend.weblink.popup.kategori';
 		return view($view, compact('kategori'));
 	}


 }