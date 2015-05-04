<?php namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\AlbumGalery;
use Illuminate\Http\Request;

class GaleryController extends Controller {

	public $base_view = 'konten.frontend.galery.';
	public function __construct(){
		view()->share('base_view', $this->base_view);
		view()->share('galery_home', true);
	}


	public function index(){
		$album = AlbumGalery::with(['mst_galery' => function($query){
			$query->orderBy('id','desc')->first();
		}])->paginate(10);
		return view($this->base_view.'index', compact('album'));
	}


}
