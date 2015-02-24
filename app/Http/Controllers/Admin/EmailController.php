<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use App\Models\Mst\AntrianEmail;
use App\Models\Mst\DataUser;
use App\Models\Mst\User;

use Input, Auth;

class EmailController extends Controller {
 
	public function __construct(){
		view()->share('emails_home', true);
	}


	public function index(){
		$data_user = DataUser::all();
		$antrian = AntrianEmail::paginate(10);
		$view = 'konten.backend.emails.index';
		return view($view, compact('antrian', 'data_user'));
	}


	public function del(){
		$o = AntrianEmail::find(Input::get('id'));
		$o->delete();
		return 'ok';
	}

	public function insert_antrian(){
		if(Input::has('add_all')){
			foreach(DataUser::all() as $list){
				$email = User::find($list->mst_user_id);
				$cek_email = AntrianEmail::where('mst_user_id', '=', Auth::user()->id)
							->where('email', '=', $email->email)
							->first();
				if(count($cek_email)<=0){
					$data_insert = [
						'email'		=> $email->email,
						'mst_user_id'	=> Auth::user()->id
					];
					AntrianEmail::create($data_insert);					
				}
			}
		}else{
			$email = User::find(Input::get('data_user'));
			$cek_email = AntrianEmail::where('mst_user_id', '=', Auth::user()->id)
						->where('email', '=', $email->email)
						->first();			
			if(count($cek_email)<=0){
				$data = [
				'email'	=> $email->email,
				'mst_user_id'	=> Auth::user()->id
				];
				AntrianEmail::create($data);

				}
		}
			return 'ok';
	}

	



}



