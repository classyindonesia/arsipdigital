<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\AlbumGalery;
use App\Models\Mst\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller {

	
	public $base_view = 'konten.backend.galery.';
	public function __construct(){
		view()->share('base_view', $this->base_view);
		view()->share('galery_home', true);
	}




	//private method

	private function create_thumbnail($nama_file){
		// create_thumbnail
		$img = \Image::make(public_path('upload/galery/'.$nama_file));
		// prevent possible upsizing
		$img->resize(340, null, function ($constraint) {
		    $constraint->aspectRatio();
		    $constraint->upsize();
		});
 		$img->save(public_path('upload/galery/thumbnail_'.$nama_file));
		// end of create_thumbnail		
	}
	//end of private method



	public function index(){
		$galery = Galery::with('mst_album_galery')->orderBy('id', 'desc')->paginate(6);
		return view($this->base_view.'index', compact('galery'));
	}


	public function upload(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576; 						
		$album = AlbumGalery::all();
		return view($this->base_view.'popup.upload', compact('album', 'max_upload'));
	}

	public function do_upload(Request $request){
		$assetPath = '/upload/galery/';
		$uploadPath = public_path($assetPath);			
		$files =  $request->file('files');
		$results = [];
			foreach($files as $file){
				try {
					$nama_file = md5($file->getClientOriginalName().'_'.date('YmdHis')).'.jpg';
				 	$file->move($uploadPath, $nama_file);
				 	$name = $file->getClientOriginalName().' telah tersimpan! ';

				 	//create thumbnail
				 	$this->create_thumbnail($nama_file);

				 	//insert to db
				 	$data_insert = [
				 		'nama_file'	=> $nama_file,
				 		'mst_album_galery_id' => $request->mst_album_galery_id
				 	];
				 	Galery::create($data_insert);
				 	//end of insert to db
				}catch(Exception $e) {
			 		$name = $file->getClientOriginalName().' gagal tersimpan!';
				}				
			}
		$results[] = compact('name');
	 return array(
	        'files' => $results,
 	    );	
	}


	public function del(Request $request){
		$g = Galery::findOrFail($request->id);

		//hapus gambar asli
			$path = public_path('upload/galery/'.$g->nama_file);
			if(file_exists($path)){
				unlink($path);
			}			

			//hapus thumbnail
			$path2 = public_path('upload/galery/thumbnail_'.$g->nama_file);
			if(file_exists($path2)){
				unlink($path2);
			}			
		$g->delete();				
		return 'ok';
	}



}
