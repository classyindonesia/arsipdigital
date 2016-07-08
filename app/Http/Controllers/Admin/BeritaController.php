<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateBerita;
use App\Models\Mst\Berita;
use App\Models\Mst\BeritaToLampiran;
use App\Models\Mst\GambarBerita;
use App\Models\Mst\LampiranBerita;
use App\Models\Mst\Vidio;
use App\Services\Berita\doUploadGambarBeritaService;
use App\Services\Berita\uploadVidioBeritaService;
use Auth, Input, Session, Fungsi;
use Illuminate\Session\Store as getSession;
use Repo\Contracts\Mst\BeritaRepoInterface;
use Repo\Contracts\Mst\PasswordMediaRepoInterface;

class BeritaController extends Controller
{

	private $base_view = 'konten.backend.berita.';
	protected $berita;
	protected $session;
	private $perPage = 10;
	protected $password;

	public function __construct(BeritaRepoInterface $berita, 
								getSession $session,
								PasswordMediaRepoInterface $password
	){
		$this->password = $password;
		$this->session = $session;
		$this->berita = $berita;
		view()->share('berita_home', true);
	}

	public function index(){
		$filter = ['order' => 'desc'];
		if($this->session->has('pencarian_berita')){
			$search_value = $this->session->get('pencarian_berita');
			$add_filter = ['search' => $search_value];		
			$filter = array_merge($filter, $add_filter);			
		}
		$berita = $this->berita->all($this->perPage, $filter);
		$nav_berita = true;
		return view($this->base_view.'index', compact('berita', 'nav_berita'));
	}


	public function create(){
		$password = $this->password->getAllDropdown();
		return view($this->base_view.'create.index', compact('password'));
	}

	public function edit($id){
		$password = $this->password->getAllDropdown();
		$berita = Berita::find($id);
		$vars = compact('berita', 'password');
		return view($this->base_view.'create.index', $vars);
	}

	public function insert(CreateOrUpdateBerita $request){
		$data = [
			'judul'		=> $request->judul,
			'mst_password_media_id'	=> $request->mst_password_media_id,
			'artikel'	=> $request->artikel,
			'is_published'	=> $request->is_published,
			'komentar'		=> $request->komentar,
			'description'	=> $request->description,
			'keyword'		=> $request->keyword,
			'mst_user_id'	=> Auth::user()->id
		];
		$insert = Berita::create($data);
		return $insert;
	}


	public function update(CreateOrUpdateBerita $request){
		$b = Berita::find($request->id);
		$b->mst_password_media_id = $request->mst_password_media_id;
		$b->judul			= $request->judul;
		$b->artikel 		= $request->artikel;
		$b->is_published 	= $request->is_published;
		$b->komentar		= $request->komentar;
		$b->description		= $request->description;
		$b->keyword			= $request->keyword;
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
		$view = $this->base_view.'popup.add_lampiran';
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
		return view($this->base_view.'popup.add_gambar', compact('gambar'));
	}

	public function upload_gambar(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;		
		$view = $this->base_view.'popup.upload_gambar';
		return view($view, compact('max_upload'));
	}

	public function do_upload_gambar(doUploadGambarBeritaService $upload){
		return $upload->handle();
	}

	public function del_gambar(delGambarBeritaService $delete){
		return $delete->handle();
	}



	public function add_vidio(){
		$vidio = Vidio::paginate(6);
		return view($this->base_view.'popup.add_vidio', compact('vidio'));
	}

	public function upload_vidio(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;			
		return view($this->base_view.'popup.upload_vidio', compact('max_upload'));		
	}


	public function do_upload_vidio(uploadVidioBeritaService $upload_vidio){
		return $upload_vidio->handle();
	}


}