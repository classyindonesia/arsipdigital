<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


/* models */
use App\Models\Mst\User;
use App\Models\Mst\Folder;
use App\Models\Mst\Rak;


class DataRefController extends Controller {
 
	public function __construct(){
		view()->share('ref_home', true);
	}



	public function index(){
		$ref_home_index = true;
  		return view('konten.backend.data_ref.index', compact('ref_home_index'));
	}


 


 
}
