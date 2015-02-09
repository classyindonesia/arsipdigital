<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


/* models */
use App\Models\Mst\User;
use App\Models\Ref\HomeBase;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRefAgama;

class RefHomeBaseController extends Controller {
 
	public function __construct(){
		view()->share('ref_home', true);
	}



	public function index(){
		$ref_home_homebase = true;
		$homebase = HomeBase::paginate(10);
  		return view('konten.backend.data_ref.ref_homebase.index', compact('ref_home_homebase', 'homebase'));
	}


	public function add(){
		return view('konten.backend.data_ref.ref_homebase.popup.add');
	}


	public function insert(CreateRefAgama $request){
		$data = [
		'nama'	=> $request->nama
		];
		HomeBase::create($data);
		return 'ok';
	}


	public function edit($id){
		$homebase = HomeBase::find($id);
		return view('konten.backend.data_ref.ref_homebase.popup.edit', compact('homebase'));
	}

 


	public function update(CreateRefAgama $request){
		$a = HomeBase::find($request->id);
		$a->nama = $request->nama;
		$a->save();

		return 'ok';
	}


	public function del(Request $request){
		$o = HomeBase::find($request->input('id'));
		$o->delete();
		return 'ok';
	}

 
}
