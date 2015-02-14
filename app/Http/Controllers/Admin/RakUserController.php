<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 

use Auth;

/* models */
use App\Models\Mst\Rak;
use App\Models\Mst\Folder;
 

 
class RakUserController extends Controller {
 
	public function __construct(){
		view()->share('my_archive', true);
	}


	public function index(){
		$rak_user = true;
		$rak = Rak::with('mst_folder')->paginate(10);
		return view('konten.backend.rak_user.index', compact('rak_user', 'rak'));
	}


	public function list_folder($id){
		$rak = Rak::find($id);
		$mst_folder = $rak->mst_folder()->with(['mst_arsip' => function($q){
			$q->where('mst_user_id', '=', Auth::user()->id);
		}])->get();
	return view('konten.backend.rak_user.popup.list_folder', compact('rak', 'mst_folder'));
	}





}