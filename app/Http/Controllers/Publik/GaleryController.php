<?php namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\AlbumGalery;
use App\Models\Mst\Galery;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\AlbumGaleryRepoInterface;

class GaleryController extends Controller {

	public $base_view = 'konten.frontend.galery.';
	protected $album;

	public function __construct(AlbumGaleryRepoInterface $album){
		view()->share('base_view', $this->base_view);
		view()->share('galery_home', true);
		$this->album = $album;
	}


	public function index(Request $request){
		$search = $request->get('search');
		if($search){
			$album = AlbumGalery::where('judul', 'like', '%'.$search.'%')
			->with(['mst_galery' => function($query){
				$query->orderBy('id','desc')->get();
			}])->paginate(6);
		}else{
			$album = AlbumGalery::with(['mst_galery' => function($query){
				$query->orderBy('id','desc')->get();
			}])->paginate(6);			
		}


		return view($this->base_view.'index', compact('album'));
	}


	public function images($mst_album_galery_id){
		$album = AlbumGalery::findOrFail($mst_album_galery_id);
		$galery = Galery::whereMstAlbumGaleryId($mst_album_galery_id)->with('mst_album_galery')->paginate(6);
		return view($this->base_view.'images.index', compact('galery', 'album'));
	}

	public function submit_password_album(Request $request)
	{
		$this->validate($request, [
			'password'	=> 'required'
		]);
		$album = $this->album->find($request->mst_album_id);
		if(count($album->mst_password_media)>0){
			if($request->password == $album->mst_password_media->password){
				// cocok
				session(['album_galery_'.$request->mst_album_id => '1']);
				return 'ok';
			}else{
				return response(['error' => ['password tdk cocok']], 422);
			}
		}
		return 'ok';
	}

	public function submit_lock_album(Request $request)
	{
		session()->forget('album_galery_'.$request->mst_album_id);
		return 'ok';
	}


	public function image($id){
		$img = Galery::findOrFail($id);
		return view($this->base_view.'image.index', compact('img'));
	}


}
