<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/* models */
use App\Models\Mst\LampiranBerita;


use Storage, Input, Fungsi, Auth;
use Illuminate\Http\Request;

class LampiranBeritaController extends Controller{

	public function __construct(){
		view()->share('berita_home', true);
	}


	public function index(){
		$lampiran_berita_home = true;
		$view = 'konten.backend.berita.lampiran.index';
		$lampiran = LampiranBerita::orderBy('id', 'DESC')->paginate(10);
		return view($view, compact('lampiran_berita_home', 'lampiran'));
	}


	public function upload_file(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;		
		return view('konten.backend.berita.lampiran.popup.upload_file', compact('max_upload'));
	}

	public function do_upload_file(Request $request){
 		$uploadPath = storage_path('lampiran/');
		$results = array();		
		$file = $request->file('files');
		try {
				$size = $file->getSize();
			 	$name = $file->getClientOriginalName();
			 	$name = Fungsi::limit_karakter($name);
		    	$nama_file_db = str_slug($name, '.');
		    	$nama_file_to_server = md5($nama_file_db).'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();			 	
			 	$file->move($uploadPath, $nama_file_to_server);
			 	$name = $file->getClientOriginalName().' telah tersimpan! ';

			 	$data_insert= [
			 		'nama'					=> Input::get('nama'),
			 		'nama_file_asli'		=> $nama_file_db,
			 		'nama_file_tersimpan'	=> $nama_file_to_server,
			 		'mst_user_id'			=> Auth::user()->id,
			 		'size'					=> $size,
			 	];
			 	LampiranBerita::create($data_insert);
			} catch(Exception $e) {
		 		$name = $file->getClientOriginalName().' gagal tersimpan!';
	 		}
	 		$results[] = compact('name');
	 return array(
	        'files' => $results,
	    );	
	}



	public function view_detil($id){
		$lampiran = LampiranBerita::find($id);
		$view = 'konten.backend.berita.lampiran.popup.view_detil';
		return view($view, compact('lampiran'));
	}

	public function del(){
		$o = LampiranBerita::find(Input::get('id'));
		$path = storage_path('lampiran/'.$o->nama_file_tersimpan);
		if(file_exists($path)){
			unlink($path);
		}
		$o->delete();
	}

	public function download($id){
		$f = LampiranBerita::find($id);
		if(count($f)>0){
			return response()->download(storage_path('lampiran/'.$f->nama_file_tersimpan), $f->nama_file_asli);			
		}else{
			abort(404);
		}
	}


}