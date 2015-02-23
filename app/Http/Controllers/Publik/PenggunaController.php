<?php namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;

/* models */
use App\Models\Mst\User;
use App\Models\Mst\DataUser;

 
/* facades */
use Session, Input;
class PenggunaController extends Controller {

	public function __construct(){
		view()->share('pencarian_pengguna_home', true);
	}
 


	public function index(){
		if(Session::has('pencarian_pengguna')){
			Session::forget('pencarian_pengguna');
		}
			return view('konten.frontend.pengguna.index');	
	}



	public function search(){
		$hashids = new \Hashids\Hashids('qertymyr');
		if(Session::has('pencarian_pengguna')){
			$pengguna = DataUser::where('nama', 'like', '%'.Session::get('pencarian_pengguna').'%')
			->with('mst_user')->paginate(10);
			return view('konten.frontend.pengguna.result', compact('pengguna', 'hashids'));
		}else{
			return redirect()->route('pengguna.index');
		}
	}


	public function detail($encrypted_id){
		$hashids = new \Hashids\Hashids('qertymyr');
		$numbers = $hashids->decode($encrypted_id);
		$id = $numbers[2];
		$pengguna = DataUser::find($id);
		$view = 'konten.frontend.pengguna.detail_pengguna';
		return view($view, compact('pengguna'));
	}





	public function submit_search(){
		if(Input::has('submit')){
			Session::put('pencarian_pengguna', Input::get('pencarian'));
		}else{
			Session::forget('pencarian_pengguna');
		}
		return 'ok';
	}


}