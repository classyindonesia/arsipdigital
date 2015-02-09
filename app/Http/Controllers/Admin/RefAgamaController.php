<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


/* models */
use App\Models\Mst\User;
use App\Models\Ref\Agama;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRefAgama;

class RefAgamaController extends Controller {
 
	public function __construct(){
		view()->share('ref_home', true);
	}



	public function index(){
		$ref_home_agama = true;
		$agama = Agama::paginate(10);
  		return view('konten.backend.data_ref.ref_agama.index', compact('ref_home_agama', 'agama'));
	}


	public function add(){
		return view('konten.backend.data_ref.ref_agama.popup.add');
	}


	public function insert(CreateRefAgama $request){
		$data = [
		'nama'	=> $request->nama
		];
		Agama::create($data);
		return 'ok';
	}


	public function edit($id){
		$agama = Agama::find($id);
		return view('konten.backend.data_ref.ref_agama.popup.edit', compact('agama'));
	}

 


	public function update(CreateRefAgama $request){
		$a = Agama::find($request->id);
		$a->nama = $request->nama;
		$a->save();

		return 'ok';
	}


	public function del(Request $request){
		$o = Agama::find($request->input('id'));
		$o->delete();
		return 'ok';
	}

 
}
