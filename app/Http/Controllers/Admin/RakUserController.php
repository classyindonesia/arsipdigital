<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 

use Auth;

/* models */
use App\Models\Mst\Rak;
 

 
class RakUserController extends Controller {
 
	public function __construct(){
		view()->share('my_archive', true);
	}


	public function index(){
		$rak_user = true;
		$rak = Rak::with('mst_folder')->paginate(10);
		return view('konten.backend.rak_user.index', compact('rak_user'));
	}





}