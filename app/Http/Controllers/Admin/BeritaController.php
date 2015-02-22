<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/*facade */
use Auth, Input, Session;

/* models*/ 
use App\Models\Mst\Berita;

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
			->paginate(10);			
		}else{
			$berita = Berita::orderBy('id', 'DESC')->paginate(10);
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
	

	public function public_berita($slug){
		$berita = Berita::findBySlug($slug);
		if($berita->is_published == 0){
			abort(404);
		}
		return view('konten.frontend.berita.index', compact('berita'));
	}



}