<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use App\Models\Mst\KategoriWeblink;
use App\Models\Mst\Weblink;

 
class WeblinkController extends Controller {
 


 	public function __construct(){
 		view()->share('weblink_home', true);
 	}



 	public function index(){
 		$weblink = Weblink::with('mst_kategori_weblink')->paginate(10);
 		$view = 'konten.backend.weblink.index';
 		return view($view, compact('weblink'));
 	}



 	public function add(){
 		$kategori = KategoriWeblink::all();
 		$view = 'konten.backend.weblink.popup.add';
 		return view($view, compact('kategori'));
 	}

 	public function edit($id){
 		$kategori = KategoriWeblink::all();
 		$weblink = Weblink::find($id);
 		$view = 'konten.backend.weblink.popup.edit';
 		return view($view, compact('kategori', 'weblink'));
 	}



	public function update(){
		$validator = \Validator::make(
			\Input::all(),
		    [
		    'nama' 						=> 'required',
		    'mst_kategori_weblink_id' 	=> 'required',
		    'url'						=> 'required|url'
		    ]
		);

		if($validator->fails()){
			//jika validator gagal
			$messages = $validator->errors();
			return response()->json($messages, 422);
 		}else{
 			$weblink = Weblink::find(\Input::get('id'));
 			$weblink->nama = \Input::get('nama');
 			$weblink->url = \Input::get('url');
 			$weblink->mst_kategori_weblink_id = \Input::get('mst_kategori_weblink_id');
 			$weblink->save();

			//jika sukses
			return 'ok';
		}
	}




	public function insert(){
		$validator = \Validator::make(
			\Input::all(),
		    [
		    'nama' 						=> 'required',
		    'mst_kategori_weblink_id' 	=> 'required',
		    'url'						=> 'required|url'
		    ]
		);

		if($validator->fails()){
			//jika validator gagal
			$messages = $validator->errors();
			return response()->json($messages, 422);
 		}else{
			$data_insert = [
				'nama' => \Input::get('nama'),
				'url'	=> \Input::get('url'),
				'mst_kategori_weblink_id'	=> \Input::get('mst_kategori_weblink_id')
				];
			Weblink::create($data_insert);
			//jika sukses
			return 'ok';
		}
	}


	public function del(){
		$o = Weblink::find(\Input::get('id'));
		$o->delete();
		return 'ok';
	}

 


	/* kelola kategori weblink */

 	public function kategori(){
 		$kategori = KategoriWeblink::all();
 		$view = 'konten.backend.weblink.popup.kategori';
 		return view($view, compact('kategori'));
 	}

 	public function add_kategori(){
 		$view = 'konten.backend.weblink.popup.add_kategori';
 		return view($view);
	}


	public function insert_kategori(){
		$validator = \Validator::make(
			\Input::all(),
		    ['nama' => 'required']
		);

		if($validator->fails()){
			//jika validator gagal
			$messages = $validator->errors();
			return response()->json($messages, 422);
 		}else{
			$data_insert = ['nama' => \Input::get('nama')];
			KategoriWeblink::create($data_insert);
			//jika sukses
			return 'ok';
		}
	}

	public function del_kategori(){
		$o = KategoriWeblink::find(\Input::get('id'));
		$o->delete();
		return 'ok';
	}


	public function edit_kategori($id){
 		$kategori = KategoriWeblink::find($id);
  		$view = 'konten.backend.weblink.popup.edit_kategori';
 		return view($view, compact('kategori'));		
	}

	public function update_kategori(){
		$validator = \Validator::make(
			\Input::all(),
		    ['nama' => 'required']
		);

		if($validator->fails()){
			//jika validator gagal
			$messages = $validator->errors();
			return response()->json($messages, 422);
 		}else{
 			$k = KategoriWeblink::find(\Input::get('id'));
 			$k->nama = \Input::get('nama');
 			$k->save();

			//jika sukses
			return 'ok';
		}		
	}

 }