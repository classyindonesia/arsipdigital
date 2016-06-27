<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\createAlbumGalery;
use App\Models\Mst\AlbumGalery;
use App\Services\AlbumGalery\DelAlbumService;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\PasswordMediaRepoInterface;

class AlbumGaleryController extends Controller {

		
	public $base_view = 'konten.backend.album_galery.';
	protected $password;

	public function __construct(PasswordMediaRepoInterface $password){
		view()->share('base_view', $this->base_view);
		view()->share('album_galery', true);
		$this->password = $password;
	}


	public function index(){
		$album_galery = AlbumGalery::all();
		return view($this->base_view.'index', compact('album_galery'));
	}

	public function add(){
		$password = $this->password->getAllDropdown();
		return view($this->base_view.'add', compact('password'));
	}

	public function store(createAlbumGalery $request){
		$data = [
		'judul'	=> $request->judul,
		'mst_password_media_id'	=> $request->mst_password_media_id,
		'keterangan'	=> $request->keterangan
		];
		AlbumGalery::create($data);

		return 'ok';
	}

	public function del(DelAlbumService $delAlbum){
		return $delAlbum->handle();
	}

	public function edit($id){
		$password = $this->password->getAllDropdown();
		$a = AlbumGalery::findOrFail($id);
		$vars = compact('a', 'password');
		return view($this->base_view.'edit', $vars);
	}

	public function update(Request $request){
		$a = AlbumGalery::findOrFail($request->id);
		$a->judul = $request->judul;
		$a->keterangan = $request->keterangan;
		$a->save();
		return 'ok';
	}



}
