<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


/* models */
use App\Models\Mst\User;
use App\Models\Ref\StatusPernikahan;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRefAgama;

class RefStatusPernikahanController extends Controller {
 
	public function __construct(){
		view()->share('ref_home', true);
	}



	public function index(){
		$ref_home_status_pernikahan = true;
		$status_pernikahan = StatusPernikahan::paginate(10);
  		return view('konten.backend.data_ref.ref_status_pernikahan.index', compact('ref_home_status_pernikahan', 'status_pernikahan'));
	}


	public function add(){
		return view('konten.backend.data_ref.ref_status_pernikahan.popup.add');
	}


	public function insert(CreateRefAgama $request){
		$data = [
		'nama'	=> $request->nama
		];
		StatusPernikahan::create($data);
		return 'ok';
	}


	public function edit($id){
		$status_pernikahan = StatusPernikahan::find($id);
		return view('konten.backend.data_ref.ref_status_pernikahan.popup.edit', compact('status_pernikahan'));
	}

 


	public function update(CreateRefAgama $request){
		$a = StatusPernikahan::find($request->id);
		$a->nama = $request->nama;
		$a->save();

		return 'ok';
	}


	public function del(Request $request){
		$o = StatusPernikahan::find($request->input('id'));
		$o->delete();
		return 'ok';
	}

 
}
