<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use App\Models\Mst\AntrianEmail;
use App\Models\Mst\DataUser;
use App\Models\Mst\User;
use App\Models\Mst\AttachEmail;

use Illuminate\Http\Request;

/* facade */
use Input, Auth, Mail, Session, Fungsi, Queue;

/* queue commands */
use App\Commands\SendEmail;
use App\Commands\DelAttachedFiles;


class EmailController extends Controller {
 
	public function __construct(){
		view()->share('emails_home', true);
	}



	private function clear_antrian(){
		$antrian = AntrianEmail::whereMstUserId(Auth::user()->id)->get();
		foreach($antrian as $list){
			$list->delete();
		}
	}

	public function index(){
		$data_user = DataUser::all();
		$penerima_home = true;
		$antrian = AntrianEmail::paginate(10);
		$view = 'konten.backend.emails.index';
		return view($view, compact('antrian', 'data_user', 'penerima_home'));
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
			$email = DataUser::find(Input::get('data_user'));
			$cek_email = AntrianEmail::where('mst_user_id', '=', Auth::user()->id)
						->where('email', '=', $email->mst_user->email)
						->first();			
			if(count($cek_email)<=0){
				$data = [
				'email'	=> $email->mst_user->email,
				'mst_user_id'	=> Auth::user()->id
				];
				AntrianEmail::create($data);

				}
		}
			return 'ok';
	}



	/* submit pengiriman email */
	public function kirim_email(){
		$antrian = AntrianEmail::whereMstUserId(Auth::user()->id)->get();
		if(Input::has('kirim')){
			foreach ($antrian as $mailuser) {
				$user = User::where('email', '=', $mailuser->email)->first();
				$subject = Input::get('subject');
				$konten = Input::get('konten');
				$my_id = Auth::user()->id;
				if(count($user)>0){
					$nama_penerima = $user->data_user->nama;					
				}else{
					$nama_penerima = null;
				}
				$email_penerima = $mailuser->email;
				Queue::push(new SendEmail($konten, $subject, $email_penerima, $nama_penerima, $my_id));
			}
			$this->clear_antrian();
			
			Queue::push(new DelAttachedFiles($my_id));

		}else{
			$this->clear_antrian();
		}
	}


	/* menu kirim email di nav atas */
	public function kirim(){
		$kirim_email_home = true;
		$jml_penerima = AntrianEmail::whereMstUserId(Auth::user()->id)->count();
		$view = 'konten.backend.emails.kirim.index';
		return view($view, compact('kirim_email_home', 'jml_penerima'));
	}



	public function attach_file(){
		$list_file = AttachEmail::whereMstUserId(Auth::user()->id)->get();
		$view = 'konten.backend.emails.popup.attach_file';
		return view($view, compact('list_file'));
	}




	public function add_attach(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;		
		$view = 'konten.backend.emails.popup.upload_file';
		return view($view, compact('max_upload'));
	}


	public function do_upload_file(Request $request){
		$assetPath = '/attach/'.Auth::user()->id.'/';
		$uploadPath = storage_path($assetPath);
		$results = array();
		$files = $request->file('files');
			 foreach ($files as $file) {
				try {
						$size = $file->getSize();
					 	$name = $file->getClientOriginalName();
					 	$name = Fungsi::limit_karakter($name);
				    	$nama_file_db = str_slug($name, '.');
					 	$file->move($uploadPath, $nama_file_db);
					 	$name = $nama_file_db.' telah tersimpan! ';

					 	/* simpan ke DB */
					 	$data_insert = [
					 		'nama_file_asli'		=> $nama_file_db,
  					 		'mst_user_id'			=> Auth::user()->id
					 	];
					 	AttachEmail::create($data_insert);
					} catch(Exception $e) {
				 		$name = $file->getClientOriginalName().' gagal tersimpan!';
			 		}
			 	
			 	$results[] = compact('name');
			 }


	 return array(
	        'files' => $results
	    );	

	}


	public function clear_attach_file(){
		$list_file = AttachEmail::whereMstUserId(Auth::user()->id)->get();
		foreach($list_file as $list){
			$path = storage_path('attach/'.Auth::user()->id.'/'.$list->nama_file_asli);
			if(file_exists($path)){
				unlink($path);
			}
			$list->delete();
		}
		return 'ok';
	}

	public function del_file(){
		$f = AttachEmail::find(Input::get('id'));
			$path = storage_path('attach/'.Auth::user()->id.'/'.$f->nama_file_asli);
			if(file_exists($path)){
				unlink($path);
			}
		$f->delete();
		return 'ok';
	}
	



}



