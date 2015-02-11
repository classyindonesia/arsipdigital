<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/* models */
use App\Models\Mst\Folder;
use App\Models\Mst\Arsip;
use Auth;

class ListFolderController extends Controller {
 
	public function __construct(){
		view()->share('my_archive', true);
	}



	public function index(){
		$folder_home = true;
		$folder = Folder::with(['mst_arsip' => function($query){
				    $query->where('mst_user_id', '=', Auth::user()->id);
				}, 'mst_rak', 'child'])
		->whereParentId(0)
		->paginate(10);

 		return view('konten.backend.folder_user.index', compact('folder_home', 'folder'));
	}


	public function list_arsip($id){
		$folder_home = true;
		$arsip = Arsip::where('mst_user_id', '=', Auth::user()->id)
				->where('mst_folder_id', '=', $id)
				->orderBy('id', 'DESC')
				->with('mst_file')
				->paginate(10);
		
		$folder = Folder::find($id);

		$jml_file = 0;
		$q_jml = Arsip::whereMstUserId(Auth::user()->id)->whereMstFolderId($id)->with('mst_file')->get();
		foreach($q_jml as $list){
			$jml_file = $jml_file+count($list->mst_file);
		}

   		return view('konten.backend.folder_user.list_arsip', compact('arsip', 'folder_home', 'folder', 'jml_file'));		
	}


	public function child($id){
		$folder_home = true;
		$folder = Folder::with(['mst_arsip' => function($query){
				    $query->where('mst_user_id', '=', Auth::user()->id);
				}, 'mst_rak', 'child'])
		->whereParentId($id)
		->paginate(10);

 		return view('konten.backend.folder_user.index', compact('folder_home', 'folder'));		
	}

 
}
