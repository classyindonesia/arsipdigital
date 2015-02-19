<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Auth, Fungsi;

/* models */
use App\Models\Mst\User;
use App\Models\Mst\Arsip;
use App\Models\Mst\Folder;
use App\Models\Mst\File;

use Illuminate\Http\Request; 
use App\Http\Requests\CreateArsip;
use App\Http\Requests\UpdateArsip;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Session\Store as Session;


class ArsipSayaController extends Controller {
 
	public function __construct(Session $session){
		$this->session = $session;
		view()->share('my_archive', true);
	}



	public function index(){
		$my_archive_home = true;



		if($this->session->has('pencarian_arsip')){
			$arsip = Arsip::where('mst_user_id', '=', Auth::user()->id)
			->orderBy('id', 'DESC')
			->where('nama', 'like', '%'.$this->session->get('pencarian_arsip').'%')
			->with('mst_file')
			->paginate(10);
			if(count($arsip)<=0){
				$arsip = Arsip::where('mst_user_id', '=', Auth::user()->id)
				->orderBy('id', 'DESC')
				->where('kode_arsip', 'like', '%'.$this->session->get('pencarian_arsip').'%')
				->with('mst_file')
				->paginate(10);				
			}
			if(count($arsip)<=0){
				$arsip = Arsip::where('mst_user_id', '=', Auth::user()->id)
				->orderBy('id', 'DESC')
				->where('keterangan', 'like', '%'.$this->session->get('pencarian_arsip').'%')
				->with('mst_file')
				->paginate(10);				
			}
		}else{
			$arsip = Arsip::where('mst_user_id', '=', Auth::user()->id)
			->orderBy('id', 'DESC')
			->with('mst_file')
			->paginate(10);
		}
	return view('konten.backend.arsip_saya.index', compact('arsip', 'my_archive_home'));
	}



	public function add(){
		$folder = Folder::all();
		return view('konten.backend.arsip_saya.popup.add', compact('folder'));
	}



	public function edit(Arsip $arsip){
		$folder = Folder::all();
		return view('konten.backend.arsip_saya.popup.edit', compact('folder', 'arsip'));
	}



	public function insert(CreateArsip $request){
		if($request->mst_user_id == NULL){
			$mst_user_id = Auth::user()->id;
		}else{
			$mst_user_id = $request->mst_user_id;
		}
		$data = [
				'nama'			=> $request->nama, 
				'kode_arsip'	=> $request->mst_folder_id, 
				'keterangan'	=> $request->keterangan, 
				'mst_folder_id'	=> $request->mst_folder_id, 
				'mst_user_id'	=> $mst_user_id, 
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

		$file  = File::whereMstArsipId($request->input('id'))->get();
		foreach($file as $list){
			
		}


		$o->delete();
		return 'ok';
	}


	public function upload_file(Arsip $arsip){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;
		$file = File::whereMstArsipId($arsip->id)->get();
		$user = User::find($arsip->mst_user_id)->data_user;
		$size = File::whereMstArsipId($arsip->id)->sum('size');
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

					 	$f = new File;
					 	$f->handle_file($nama_file_to_server);
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


	public function hapus_file(Request $request, File $f){
		$file = File::find($request->input('id'));
		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);
		$path_file = $uploadPath.'/'.$file->nama_file_tersimpan;
		if(file_exists($path_file)){
			unlink($path_file);
		}
		$f->remove_watermark_file($file->nama_file_tersimpan);
		$file->delete();
		return 'ok';
	}

	/* param = id file table */
	public function download_file($id){
		$file = File::find($id);
		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);		
		return response()->download($uploadPath.'/'.$file->nama_file_tersimpan, $file->nama_file_asli);
	}



	/* param = id file table */
	public function download_file_watermark($id, File $f){
		$file = File::find($id);
		$assetPath = '/upload/arsip/watermark';
		$uploadPath = public_path($assetPath);	

		if(!file_exists($uploadPath.'/'.$file->nama_file_tersimpan)){
			$f->handle_file($file->nama_file_tersimpan);
		}		

		$cek = $f->get_jenis_eksternsi($file->nama_file_tersimpan);
		if($cek != 1){
			abort(403, 'Unauthorized action.');
		}

	
		return response()->download($uploadPath.'/'.$file->nama_file_tersimpan, $file->nama_file_asli);
	}



	public function before_download($id, File $f){
		$file = File::find($id);

		$assetPath = '/upload/arsip/watermark';
		$uploadPath = public_path($assetPath);	

		if(!file_exists($uploadPath.'/'.$file->nama_file_tersimpan)){
			$f->handle_file($file->nama_file_tersimpan);
		}	

		
		$cek = $f->get_jenis_eksternsi($file->nama_file_tersimpan);		
		return view('konten.backend.arsip_saya.popup.before_download', compact('file', 'cek'));
	}


	public function view_file($id, File $file){
		$file = $file->find($id);
		$cek = $file->get_jenis_eksternsi($file->nama_file_tersimpan);
		if($cek == 1 || $cek == 2){
			return view('konten.backend.arsip_saya.file.view', compact('file', 'cek'));
		}else{
			abort(403, 'Unauthorized action.');
		}
		
	}



	/* khusus view file pdf */
	public function view_file_pdf($id, File $file){
		$file = $file->find($id);
		$cek = $file->get_jenis_eksternsi($file->nama_file_tersimpan);
		if($cek == 2){
			return view('konten.backend.arsip_saya.file.view_pdf_full', compact('file', 'cek'));
		}else{
			abort(403, 'Unauthorized action.');
		}
	}


 
}
