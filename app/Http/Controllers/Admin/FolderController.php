<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\User;
use App\Models\Mst\Folder;
use App\Models\Mst\Rak;
use App\Http\Requests\CreateFolder;
use App\Http\Requests\UpdateFolder;

use Illuminate\Http\Request;


class FolderController extends Controller {
 
	public function __construct(){
		view()->share('folder_home', true);
	}



	public function index(){
		$folder = Folder::with('mst_rak', 'child')->whereParentId(0)->paginate(10);
 		return view('konten.backend.folder.index', compact('folder'));
	}


	public function child($id){
		$folder = Folder::with('mst_rak', 'child')->whereParentId($id)->paginate(10);
 		return view('konten.backend.folder.index', compact('folder'));		
	}


	public function add(){
		$parent = Folder::all();
		$rak = Rak::all();
  		return view('konten.backend.folder.popup.add', compact('parent', 'rak'));
	}

	public function insert(CreateFolder $request){
		$data = [
			'nama'			=> $request->nama,
			'keterangan'	=> $request->keterangan,
			'mst_rak_id'	=> $request->mst_rak_id,
			'mst_user_id'	=> $request->mst_user_id,
			'parent_id'		=> $request->parent_id,
		];
		Folder::create($data);
		return 'ok';
	}

	public function edit($id){
		$folder = Folder::find($id);
		$parent = Folder::where('id', '!=', $id)->where('parent_id', '=', 0)->get();
		$rak = Rak::all();
		return view('konten.backend.folder.popup.edit', compact('parent', 'rak', 'folder'));
	}

	public function update(UpdateFolder $request){
			$r = Folder::find($request->id);
			$r->nama = $request->nama;
			$r->mst_rak_id = $request->mst_rak_id;
			$r->parent_id	= $request->parent_id;
			$r->keterangan = $request->keterangan;
			$r->save();
		return $request->all();
	}


	public function del(Request $request){
		$o = Folder::find($request->input('id'));
		$o->delete();
		return 'ok';
	}


 
}
