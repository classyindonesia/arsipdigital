<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use App\Models\Mst\AntrianEmail;
use App\Models\Mst\DataUser;
use App\Models\Mst\User;

use Input, Auth, Mail;

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



	public function kirim_email(){
		$antrian = AntrianEmail::where('mst_user_id', '=', Auth::user()->id)->get();
		if(Input::has('kirim')){
			/*
			 	$data = [];
				Mail::queue('emails.pesan', $data, function($message){
					$antrian = AntrianEmail::where('mst_user_id', '=', Auth::user()->id)->get();
					foreach($antrian as $list){
						$email= $list->email;
						$user = User::where('email', '=', $mail)->first();
						$email2 = $user->email;
						$nama = $user->data_user->nama;
					    $message->to($email2, $nama)->subject('Welcome!');
				    }
				}); 
				*/

		foreach ($antrian as $mailuser) {
			$data = [];
		    Mail::queue('emails.pesan', $data, function($message) use ($mailuser) {
		        $message
		          ->from(env('EMAIL_PENGIRIM'))
		          ->to($mailuser['email'], $mailuser['email'] )
		          ->subject(Input::get('subject'));
		    });
		}

		}else{			
			foreach($antrian as $list){
				$list->delete();
			}
		}
	}

	



}



