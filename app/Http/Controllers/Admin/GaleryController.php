<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\AlbumGalery;
use App\Models\Mst\Galery;
use App\Services\Galery\uploadImageService;
use Illuminate\Http\Request;

class GaleryController extends Controller {

	
	public $base_view = 'konten.backend.galery.';
	public function __construct(){
		view()->share('base_view', $this->base_view);
		view()->share('galery_home', true);
	}

 
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

	public function do_upload(uploadImageService $upload){
		return $upload->handle();
	}


	public function del(deleteImageService $deleteImage){
		return $deleteImage->handle();
	}



}
