<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\createAlbumGalery;
use App\Models\Mst\AlbumGalery;
use Illuminate\Http\Request;

class AlbumGaleryController extends Controller {

		
	public $base_view = 'konten.backend.album_galery.';

	public function __construct(){
		view()->share('base_view', $this->base_view);
		view()->share('album_galery', true);
	}


	public function index(){
		$album_galery = AlbumGalery::all();
		return view($this->base_view.'index', compact('album_galery'));
	}

	public function add(){
		return view($this->base_view.'add');
	}

	public function store(createAlbumGalery $request){
		$data = [
		'judul'	=> $request->judul,
		'keterangan'	=> $request->keterangan
		];
		AlbumGalery::create($data);

		return 'ok';
	}

	public function del(delAlbumService $delAlbum){
		return $delAlbum->handle();
	}

	public function edit($id){
		$a = AlbumGalery::findOrFail($id);
		return view($this->base_view.'edit', compact('a'));
	}

	public function update(Request $request){
		$a = AlbumGalery::findOrFail($request->id);
		$a->judul = $request->judul;
		$a->keterangan = $request->keterangan;
		$a->save();
		return 'ok';
	}



}
