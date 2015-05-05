<?php namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\AlbumGalery;
use App\Models\Mst\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller {

	public $base_view = 'konten.frontend.galery.';
	public function __construct(){
		view()->share('base_view', $this->base_view);
		view()->share('galery_home', true);
	}


	public function index(){
		$album = AlbumGalery::with(['mst_galery' => function($query){
			$query->orderBy('id','desc')->get();
		}])->paginate(6);
		return view($this->base_view.'index', compact('album'));
	}


	public function images($mst_album_galery_id){
		$galery = Galery::whereMstAlbumGaleryId($mst_album_galery_id)->with('mst_album_galery')->paginate(6);
		return view($this->base_view.'images.index', compact('galery'));
	}


	public function image($id){
		$img = Galery::findOrFail($id);
		return view($this->base_view.'image.index', compact('img'));
	}


}
