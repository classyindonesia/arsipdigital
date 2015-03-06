<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/* models */
use App\Models\Mst\FotoSlide;
use App\Models\Ref\Jabatan;


class FotoSlideController extends Controller {
 
	public function __construct(){
		view()->share('foto_slide_home', true);
	}


	public function index(){
		$foto_slide = FotoSlide::with('ref_jabatan')->orderBy('id', 'DESC')->paginate(8);
		return view('konten.backend.foto_slide.index', compact('foto_slide'));
	}


	public function upload(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;		
		$ref_jabatan = Jabatan::all();
		return view('konten.backend.foto_slide.popup.upload_foto', compact('ref_jabatan', 'max_upload'));
	}

	public function do_upload(){
		$results = array();
		$file = \Request::file('files');
			try{
				$assetPath = '/upload/foto_slide';
				$uploadPath = public_path($assetPath);

				 	$name = $file->getClientOriginalName();
			 	$name = \Fungsi::limit_karakter($name);
		    	$nama_file_db = str_slug($name, '.');
		    	$nama_file_to_server = md5($nama_file_db).'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();			 	
			 	$file->move($uploadPath, $nama_file_to_server);
			 	$name = $file->getClientOriginalName().' telah tersimpan! ';				

			 	$data_insert = [
			 		'nama'					=> \Input::get('nama'),
			 		'ref_jabatan_id'		=> \Input::get('ref_jabatan_id'),
			 		'no_induk'				=> \Input::get('no_induk'),
			 		'nama_file_asli'		=> $nama_file_to_server,
			 		'mst_user_id'			=> \Auth::user()->id
			 	];
			 	FotoSlide::create($data_insert);


				// resize gambar
				$img = \Image::make(public_path('upload/foto_slide/'.$nama_file_to_server));
				// prevent possible upsizing
				$img->resize(null, 180, function ($constraint) {
				    $constraint->aspectRatio();
				    $constraint->upsize();
				});
				$img->save();
			} catch(Exception $e) {
		 		$name = $file->getClientOriginalName().' gagal tersimpan!';
		}
		$results[] = compact('name');	
 
	 return array(
	        'files' => $results,
 	    );	
	}


	public function del(){
		$o = FotoSlide::find(\Input::get('id'));
		$path = public_path('upload/foto_slide/'.$o->nama_file_asli);
		if(file_exists($path)){
			unlink($path);
		}
		$o->delete();
		return 'ok';
	}
	



	/* kelola jabatan */
	public function jabatan(){
		$jabatan = Jabatan::all();
		return view('konten.backend.foto_slide.popup.jabatan.list_data', compact('jabatan'));
	}

	public function add_jabatan(){
		return view('konten.backend.foto_slide.popup.jabatan.form_add');
	}
	public function edit_jabatan($id){
		$jabatan = Jabatan::find($id);
		return view('konten.backend.foto_slide.popup.jabatan.form_edit', compact('jabatan'));
	}	

	public function insert_jabatan(){
		$data = [
			'nama'	=> \Input::get('nama'),
		];
		Jabatan::create($data);
		return 'ok';
	}

	public function update_jabatan(){
		$o = Jabatan::find(\Input::get('id'));
		$o->nama = \Input::get('nama');
		$o->save();
		return 'ok';
	}

	public function del_jabatan(){
		$o = Jabatan::find(\Input::get('id'));
		$o->delete();
		return 'ok';
	}


}
