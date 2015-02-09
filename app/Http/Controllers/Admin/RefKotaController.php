<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


/* models */
use App\Models\Mst\User;
use App\Models\Ref\Kota;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRefAgama;

class RefKotaController extends Controller {
 
	public function __construct(){
		view()->share('ref_home', true);
	}



	public function index(){
		$ref_home_kota = true;
		$kota = Kota::paginate(10);
  		return view('konten.backend.data_ref.ref_kota.index', compact('ref_home_kota', 'kota'));
	}


	public function add(){
		return view('konten.backend.data_ref.ref_kota.popup.add');
	}


	public function insert(CreateRefAgama $request){
		$data = [
		'nama'	=> $request->nama
		];
		Kota::create($data);
		return 'ok';
	}


	public function edit($id){
		$kota = Kota::find($id);
		return view('konten.backend.data_ref.ref_kota.popup.edit', compact('kota'));
	}

 


	public function update(CreateRefAgama $request){
		$a = Kota::find($request->id);
		$a->nama = $request->nama;
		$a->save();

		return 'ok';
	}


	public function del(Request $request){
		$o = Kota::find($request->input('id'));
		$o->delete();
		return 'ok';
	}

 
}
