<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/*facade */
use Auth, Input, Session, Fungsi;

/* models*/ 
use App\Models\Mst\Berita;
use App\Models\Mst\BeritaToLampiran;
use App\Models\Mst\LampiranBerita;
use App\Models\Mst\GambarBerita;
use App\Models\Mst\Vidio;


/* request */
use App\Http\Requests\CreateOrUpdateBerita;
class BeritaController extends Controller{


	public function __construct(){
		view()->share('berita_home', true);
	}

	public function index(){
		if(Session::has('pencarian_berita')){
			$berita = Berita::orderBy('id', 'DESC')
			->where('judul', 'like', '%'.Session::get('pencarian_berita').'%')
			->with('berita_to_lampiran')
			->paginate(10);			
		}else{
			$berita = Berita::orderBy('id', 'DESC')->with('berita_to_lampiran')->paginate(10);
		}
		$nav_berita = true;
		return view('konten.backend.berita.index', compact('berita', 'nav_berita'));
	}


	public function create(){
		return view('konten.backend.berita.create.index');
	}

	public function edit($id){
		$berita = Berita::find($id);
		return view('konten.backend.berita.create.index', compact('berita'));
	}

	public function insert(CreateOrUpdateBerita $request){
		$data = [
			'judul'		=> $request->judul,
			'artikel'	=> $request->artikel,
			'is_published'	=> $request->is_published,
			'komentar'		=> $request->komentar,
			'mst_user_id'	=> Auth::user()->id
		];
		$insert = Berita::create($data);
		return $insert;
	}


	public function update(CreateOrUpdateBerita $request){
		$b = Berita::find($request->id);
		$b->judul			= $request->judul;
		$b->artikel 		= $request->artikel;
		$b->is_published 	= $request->is_published;
		$b->komentar		= $request->komentar;
		$b->save();

		return $request->all();		
	}

	public function submit_search(){
		if(Input::has('submit')){
			Session::put('pencarian_berita', Input::get('pencarian'));
		}else{
			Session::forget('pencarian_berita');
		}
		return 'ok';

	}



	public function del(){
		$o = Berita::find(Input::get('id'));
		$o->delete();
		return 'ok';
	}
	





	public function add_lampiran($id){
		$list_lampiran = Fungsi::get_dropdown(LampiranBerita::orderBy('id','DESC')->get(), 'lampiran');
		$lampiran = BeritaToLampiran::where('mst_berita_id', '=', $id)->with('mst_lampiran')->get();
		$view = 'konten.backend.berita.popup.add_lampiran';
		return view($view, compact('lampiran', 'list_lampiran'));
	}


	public function insert_lampiran(){
		$data = [
		'mst_lampiran_berita_id'	=> Input::get('mst_lampiran_berita_id'),
		'mst_berita_id'				=> Input::get('mst_berita_id'),
		];
		BeritaToLampiran::create($data);
		return 'ok';
	}

	public function del_lampiran(){
		$o = BeritaToLampiran::find(Input::get('id'));
		$o->delete();
		return 'ok';
	}



	public function add_gambar(){
		$gambar = GambarBerita::orderBy('id', 'DESC')->paginate(6);
		return view('konten.backend.berita.popup.add_gambar', compact('gambar'));
	}

	public function upload_gambar(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;		
		$view = 'konten.backend.berita.popup.upload_gambar';
		return view($view, compact('max_upload'));
	}

	public function do_upload_gambar(){
		$results = array();
		foreach(\Request::file('files') as $file){
			try{
						$assetPath = '/upload/gambar_berita';
						$uploadPath = public_path($assetPath);

 					 	$name = $file->getClientOriginalName();
					 	$name = Fungsi::limit_karakter($name);
				    	$nama_file_db = str_slug($name, '.');
				    	$nama_file_to_server = md5($nama_file_db).'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();			 	
					 	$file->move($uploadPath, $nama_file_to_server);
					 	$name = $file->getClientOriginalName().' telah tersimpan! ';				
 
					 	$data_insert = [
					 		'nama_file_asli'		=> $nama_file_to_server,
  					 		'mst_user_id'			=> Auth::user()->id
					 	];
					 	GambarBerita::create($data_insert);


						// resize gambar
						$img = \Image::make(public_path('upload/gambar_berita/'.$nama_file_to_server));
						// prevent possible upsizing
						$img->resize(null, 400, function ($constraint) {
						    $constraint->aspectRatio();
						    $constraint->upsize();
						});
						$img->save();


			} catch(Exception $e) {
				 		$name = $file->getClientOriginalName().' gagal tersimpan!';
				 		//$results[] = compact('name');   
			 		}
		$results[] = compact('name');	
		}
	 return array(
	        'files' => $results,
 	    );		
	}

	public function del_gambar(){
		$o = GambarBerita::find(Input::get('id'));

		$path = public_path('upload/gambar_berita/'.$o->nama_file_asli);
		if(file_exists($path)){
 			unlink($path);
		} 
		$o->delete();
		return 'ok';
	}



	public function add_vidio(){
		$vidio = Vidio::paginate(6);
		return view('konten.backend.berita.popup.add_vidio', compact('vidio'));
	}

	public function upload_vidio(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;			
		return view('konten.backend.berita.popup.upload_vidio', compact('max_upload'));		
	}


	public function do_upload_vidio(){
		$results = array();
		foreach(\Request::file('files') as $file){
			try{
						$assetPath = '/upload/vidio';
						$uploadPath = public_path($assetPath);

 					 	$name = $file->getClientOriginalName();
					 	$name = Fungsi::limit_karakter($name);
				    	$nama_file_db = str_slug($name, '.');
				    	$nama_file_to_server = md5($nama_file_db).'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();			 	
					 	$file->move($uploadPath, $nama_file_to_server);
					 	$name = $file->getClientOriginalName().' telah tersimpan! ';				
 
					 	$data_insert = [
					 		'nama_file_asli'		=> $nama_file_to_server,
  					 		'mst_user_id'			=> Auth::user()->id
					 	];
					 	Vidio::create($data_insert);

 

			} catch(Exception $e) {
				 		$name = $file->getClientOriginalName().' gagal tersimpan!';
				 		//$results[] = compact('name');   
			 		}
		$results[] = compact('name');	
		}
	 return array(
	        'files' => $results,
 	    );	

	}


}