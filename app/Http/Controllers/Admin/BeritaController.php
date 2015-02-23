<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/*facade */
use Auth, Input, Session, Fungsi;

/* models*/ 
use App\Models\Mst\Berita;
use App\Models\Mst\BeritaToLampiran;
use App\Models\Mst\LampiranBerita;

/* request */
use App\Http\Requests\CreateOrUpdateBerita;
class BeritaController extends Controller{


	public function __construct(){
		view()->share('berita_home', true);
	}

	public function index(){
		if(Session::has('pencarian_berita')){
			$berita = Berita::orderBy('id', 'DESC')
			->where('judul', 'like', '%'.Session::get('pencarian_berita').'%')
			->with('berita_to_lampiran')
			->paginate(10);			
		}else{
			$berita = Berita::orderBy('id', 'DESC')->with('berita_to_lampiran')->paginate(10);
		}
		$nav_berita = true;
		return view('konten.backend.berita.index', compact('berita', 'nav_berita'));
	}


	public function create(){
		return view('konten.backend.berita.create.index');
	}

	public function edit($id){
		$berita = Berita::find($id);
		return view('konten.backend.berita.create.index', compact('berita'));
	}

	public function insert(CreateOrUpdateBerita $request){
		$data = [
			'judul'		=> $request->judul,
			'artikel'	=> $request->artikel,
			'is_published'	=> $request->is_published,
			'komentar'		=> $request->komentar,
			'mst_user_id'	=> Auth::user()->id
		];
		$insert = Berita::create($data);
		return $insert;
	}


	public function update(CreateOrUpdateBerita $request){
		$b = Berita::find($request->id);
		$b->judul			= $request->judul;
		$b->artikel 		= $request->artikel;
		$b->is_published 	= $request->is_published;
		$b->komentar		= $request->komentar;
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
		$view = 'konten.backend.berita.popup.add_lampiran';
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


}