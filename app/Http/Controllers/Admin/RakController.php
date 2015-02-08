<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\User;
use App\Models\Mst\Rak;
use App\Http\Requests\CreateRak;
use App\Http\Requests\UpdateRak;

use Illuminate\Http\Request;


class RakController extends Controller {
 
	public function __construct(){
		view()->share('rak_home', true);
	}



	public function index(){
		$rak = Rak::paginate(10);
 		return view('konten.backend.rak.index', compact('rak'));
	}


	public function add(){
  		return view('konten.backend.rak.popup.add');
	}

	public function insert(CreateRak $request){
		$data = [
		'nama'	=> $request->nama,
		'keterangan'	=> $request->keterangan,
		'kode_rak'		=> 'ok'
		];
		Rak::create($data);
		return 'ok';
	}

	public function edit($id){
		$rak = Rak::find($id);
		return view('konten.backend.rak.popup.edit', compact('rak'));
	}

	public function update(UpdateRak $request){
		$r = Rak::find($request->id);
		$r->nama = $request->nama;
		$r->keterangan = $request->keterangan;
		$r->save();
		return $request->all();
	}


	public function del(Request $request){
		$o = Rak::find($request->input('id'));
		$o->delete();
		return 'ok';
	}


 
}
