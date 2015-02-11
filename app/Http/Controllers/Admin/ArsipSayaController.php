<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArsip;
use App\Http\Requests\UpdateArsip;

use Auth;

/* models */
use App\Models\Mst\User;
use App\Models\Mst\Arsip;
use App\Models\Mst\Folder;
use App\Models\Mst\File;
use Illuminate\Http\Request; 
use App\Helpers\Fungsi;

use Illuminate\Contracts\Filesystem\Filesystem;

class ArsipSayaController extends Controller {
 
	public function __construct(){
		view()->share('my_archive', true);
	}



	public function index(){
		$my_archive_home = true;
		$arsip = Arsip::where('mst_user_id', '=', Auth::user()->id)
		->orderBy('id', 'DESC')
		->with('mst_file')
		->paginate(10);
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


	public function upload_file($id){

	$max = explode('M', ini_get("upload_max_filesize"));
	$max_upload = $max[0] * 1048576;

		$arsip = Arsip::find($id);
		$file = File::whereMstArsipId($id)->get();
		$user = User::find($arsip->mst_user_id)->data_user;
		$size = File::whereMstArsipId($id)->sum('size');
		return view('konten.backend.arsip_saya.upload_file', compact('arsip', 'file', 'user', 'size', 'max_upload'));
	} 

	
	public function list_file_raw($id){
		$file = File::whereMstArsipId($id)->get();
		return view('konten.backend.arsip_saya.list_file_uploaded', compact('file'));
	}


	public function do_upload_file(Request $request, Filesystem $filesystem){
		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);

		$results = array();
		$files = $request->file('files');

			 foreach ($files as $file) {

				try {
						$size = $file->getSize();
					 	$name = $file->getClientOriginalName();
					 	$name = Fungsi::limit_karakter($name);
				    	$nama_file_db = str_slug($name, '.');
				    	$nama_file_to_server = md5($nama_file_db).'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();			 	
					 	$file->move($uploadPath, $nama_file_to_server);
					 	$name = $file->getClientOriginalName().' telah tersimpan! ';

					 	/* simpan ke DB */
					 	$data_insert = [
					 		'nama_file_asli'		=> $nama_file_db,
					 		'nama_file_tersimpan'	=> $nama_file_to_server,
					 		'size'					=> $size,//bytes
					 		'mst_arsip_id'			=> $request->input('mst_arsip_id'),
					 		'mst_user_id'			=> Auth::user()->id
					 	];
					 	File::create($data_insert);

					} catch(Exception $e) {
				 		$name = $file->getClientOriginalName().' gagal tersimpan!';
				 		//$results[] = compact('name');   
			 		}
			 	
			 	$results[] = compact('name');
			 }

$size_all_files = File::whereMstArsipId($request->input('mst_arsip_id'))->sum('size');
	 return array(
	        'files' => $results,
	        'jml_file'	=> File::whereMstArsipId($request->input('mst_arsip_id'))->count(),
	        'size_all_files'	=> Fungsi::size($size_all_files)
	    );		
	}


	public function hapus_file(Request $request){
		$file = File::find($request->input('id'));
		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);
		$path_file = $uploadPath.'/'.$file->nama_file_tersimpan;
		if(file_exists($path_file)){
			unlink($path_file);
		}
		$file->delete();
		return 'ok';
	}


 
}