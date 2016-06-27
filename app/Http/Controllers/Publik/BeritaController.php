<?php namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use App\Models\Mst\Berita;
use App\Models\Mst\LampiranBerita;
use Illuminate\Http\Request;
use Input;
use Repo\Contracts\Mst\BeritaRepoInterface;

class BeritaController extends Controller {
 
 	private $base_view = 'konten.frontend.berita.';
 	protected $berita;

 	public function __construct(BeritaRepoInterface $berita)
 	{
 		$this->berita = $berita;
 		view()->share('base_view', $this->base_view);
 	}


	public function public_berita($slug){
		$hashids = new \Hashids\Hashids('qertymyr');
		$berita = Berita::where('slug', $slug)->first();
		if($berita->is_published == 0){
			abort(404);
		}
		return view('konten.frontend.berita.index', compact('berita', 'hashids'));
	}

	public function submit_password_berita(Request $request)
	{
		$this->validate($request, [
			'password'	=> 'required'
		]);
		$berita = $this->berita->find($request->mst_berita_id);
		if(count($berita->mst_password_media)>0){
			if($request->password == $berita->mst_password_media->password){
				// cocok
				session(['berita_'.$request->mst_berita_id => '1']);
				return 'ok';
			}else{
				return response(['error' => ['password tdk cocok']], 422);
			}
		}
		return 'ok';
	}

	public function submit_lock_berita(Request $request)
	{
		session()->forget('berita_'.$request->mst_berita_id);
		return 'ok';
	}





	public function download_lampiran($encrypted_id){
		$hashids = new \Hashids\Hashids('qertymyr');
		$numbers = $hashids->decode($encrypted_id);
		$id = $numbers[2];
				
		$f = LampiranBerita::find($id);
		if(count($f)>0){
			$pathToFile = storage_path('lampiran/'.$f->nama_file_tersimpan);
			if(file_exists($pathToFile)){
				return response()->download($pathToFile, $f->nama_file_asli);							
			}else{
				return response('error, file tdk ditemukan dalam server!', 404);
			}
		}else{
			abort(404);
		}		
	}


	public function daftar_berita(){
		$view = 'konten.frontend.berita.daftar_berita.index';
		$berita = Berita::orderBy('id', 'DESC')->whereIsPublished(1)->paginate(10);
		return view($view, compact('berita'));
	}

	public function search_berita(){
		$view = 'konten.frontend.berita.daftar_berita.search_result';
		$berita = Berita::orderBy('id', 'DESC')
			->whereIsPublished(1)
			->where('judul', 'like', '%'.Input::get('pencarian').'%')
			->get();
		return view($view, compact('berita'));		
	}

 }