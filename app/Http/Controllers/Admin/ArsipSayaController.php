<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArsip;
use App\Http\Requests\UpdateArsip;

use Auth;

/* models */
use App\Models\Mst\User;
use App\Models\Mst\Arsip;
use App\Models\Mst\Folder;
use Illuminate\Http\Request; 


class ArsipSayaController extends Controller {
 
	public function __construct(){
		view()->share('my_archive', true);
	}



	public function index(){
		$my_archive_home = true;
		$arsip = Arsip::where('mst_user_id', '=', Auth::user()->id)
		->orderBy('id', 'DESC')->paginate(10);
   		return view('konten.backend.arsip_saya.index', compact('arsip', 'my_archive_home'));
	}



	public function add(){
		$folder = Folder::all();
		return view('konten.backend.arsip_saya.popup.add', compact('folder'));
	}



	public function edit($id){
		$folder = Folder::all();
		$arsip 	= Arsip::find($id);
		return view('konten.backend.arsip_saya.popup.edit', compact('folder', 'arsip'));
	}



	public function insert(CreateArsip $request){
		$data = [
				'nama'			=> $request->nama, 
				'kode_arsip'	=> $request->mst_folder_id, 
				'keterangan'	=> $request->keterangan, 
				'mst_folder_id'	=> $request->mst_folder_id, 
				'mst_user_id'	=> Auth::user()->id, 
				'tgl_arsip'		=> $request->tgl_arsip,
				'tgl_surat'		=> $request->tgl_surat, 
				'no_surat'		=> $request->no_surat, 
				'nama_tujuan'	=> $request->nama_tujuan
		];
		Arsip::create($data);
		return 'ok';
	}


	public function update(UpdateArsip $request){
		$a = Arsip::find($request->id);
		$a->nama 		= $request->nama;
		$a->keterangan	= $request->keterangan;
		$a->mst_folder_id	= $request->mst_folder_id;
		$a->tgl_arsip		= $request->tgl_arsip;
		$a->tgl_surat		= $request->tgl_surat;
		$a->no_surat		= $request->no_surat;
		$a->nama_tujuan		= $request->nama_tujuan;
		$a->save();

		return 'ok';
	}




 		public function del(Request $request){
 			$o = Arsip::find($request->input('id'));
 			$o->delete();
 			return 'ok';
 		}
 	


 
}
