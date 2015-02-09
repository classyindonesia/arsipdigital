<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


/* models */
use App\Models\Mst\User;
use App\Models\Ref\StatusIkatan;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRefAgama;

class RefStatusIkatanController extends Controller {
 
	public function __construct(){
		view()->share('ref_home', true);
	}



	public function index(){
		$ref_home_status_ikatan = true;
		$status_ikatan = StatusIkatan::paginate(10);
  		return view('konten.backend.data_ref.ref_status_ikatan.index', compact('ref_home_status_ikatan', 'status_ikatan'));
	}


	public function add(){
		return view('konten.backend.data_ref.ref_status_ikatan.popup.add');
	}


	public function insert(CreateRefAgama $request){
		$data = [
		'nama'	=> $request->nama
		];
		StatusIkatan::create($data);
		return 'ok';
	}


	public function edit($id){
		$status_ikatan = StatusIkatan::find($id);
		return view('konten.backend.data_ref.ref_status_ikatan.popup.edit', compact('status_ikatan'));
	}

 


	public function update(CreateRefAgama $request){
		$a = StatusIkatan::find($request->id);
		$a->nama = $request->nama;
		$a->save();

		return 'ok';
	}


	public function del(Request $request){
		$o = StatusIkatan::find($request->input('id'));
		$o->delete();
		return 'ok';
	}

 
}
