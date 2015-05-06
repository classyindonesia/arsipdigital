<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/* request */
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;

/* models */
use App\Models\Mst\User;
use App\Models\Mst\DataUser;
use App\Models\Ref\UserLevel;

/* Facade */
use Excel, Fungsi, Reader, Auth, Session, Gravatar, Input;

class UserController extends Controller{



	public $base_view = 'konten.backend.users.';

	public function __construct(Session $session){
		view()->share('users_home', true);
	}


	public function index(){
		if(Session::has('pencarian_user')){
			$users = DataUser::where('nama', 'like', '%'.Session::get('pencarian_user').'%')->paginate(10);
		}else{
			$users = DataUser::paginate(10);
		}

		return view($this->base_view.'index', compact('users'));
	}


	public function submit_search(Request $request){
		if($request->has('submit')){
			Session::put('pencarian_user', $request->input('pencarian'));
		}else{
			Session::forget('pencarian_user');
		}
		return 'ok';
	}



	public function add(){
		$level = UserLevel::all();
		return view($this->base_view.'popup.add', compact('level'));
	}

	public function insert(CreateUser $request, User $users, DataUser $data_user, Gravatar $gravatar){
		/* START insert ke tabel mst_users */
			$data_insert = [
			'email'	=> $request->email,
			'password'	=>  $request->password,
			'ref_user_level_id'	=> $request->ref_user_level_id,
			];
			$insert = $users->create($data_insert);
		/* END insert ke tabel mst_users */

		$gravatar->fetch_image($request->email);

		/* START insert ke tabel mst_data_user */
			$data_user_insert = [
				'nama'	=> $request->nama,
				'mst_user_id'	=> $insert->id
			];
			$data_user->create($data_user_insert);
		/* END insert ke tabel mst_data_user */
	return $request->all();
	}





	public function edit($id){
		$level = UserLevel::all();
		$user = User::with('data_user')->whereId($id)->first();
		return view($this->base_view.'popup.edit', compact('level', 'user'));
	}


	public function update(UpdateUser $request){
		$u = User::find($request->user_id);
		$u->email = $request->email;
		$u->ref_user_level_id = $request->ref_user_level_id;
		$u->save();

		//update data user / insert
		if(count($u->data_user)<=0){
			$create_data = [
				'nama'	=> $request->nama,
				'mst_user_id'	=> $request->user_id
			];
			DataUser::create($create_data);
		}else{
			$du = DataUser::find($request->user_data_id);
			$du->nama = $request->nama;
			$du->save();			
		}
		return $request->all();
	}


	public function del(Request $request){
		$o = User::find($request->input('id'));
		$d = DataUser::whereMstUserId($request->input('id'))->first();
		if(count($d)>0) $d->delete();
		$o->delete();
		return 'ok';
	}
	




	public function import(){
	$max = explode('M', ini_get("upload_max_filesize"));
	$max_upload = $max[0] * 1048576;		
		return view($this->base_view.'popup.import', compact('max_upload'));
	}




	public function do_import(Request $request, Gravatar $gravatar){
	$files = $request->file('files');
	$results = array();


			 foreach ($files as $file) {

				try {
					 
	                $data = new Reader($file); 
	                $a = $data->rowcount($sheet_index=0); 
		            for($i=1;$i<=$a;$i++){
		                if($i != 1 && $i != 2){                    
		                      $no  	= trim($data->val($i, 'B')); //username email
		                      $no2 	= trim($data->val($i, 'C')); // domain email
		                      $no3 = trim($data->val($i, 'D')); // Password

		                      // data user 
		                      $no4 = trim($data->val($i, 'E')); //nama
		                      $no5 = trim($data->val($i, 'F')); // alamat
		                      $no6 = trim($data->val($i, 'G')); // no hp
		                      $no7 = trim($data->val($i, 'H')); //nama ibu kandung
		                      $no8 = trim($data->val($i, 'I')); // no ktp
		                      $no9 = trim($data->val($i, 'J')); // tempat lahir
		                      $no10 = trim($data->val($i, 'K')); // tgl lahir
		                      $no11 = trim($data->val($i, 'L')); // ID homebase

		                       if($no != NULL && $no2 != NULL){

		                       	$email = $no.'@'.$no2;
		                       	if($no3 == NULL){
		                       		$password = $email;
		                       	}else{
		                       		$password = $no3;
		                       	}

								$user = User::whereEmail($email)->first();
								if(count($user)>0){
									$user->password = $no3;
									$user->save();
									$name = 'user dgn email : '.$email.' sudah ada dlm database, status updated!';
								}else{
									$gravatar->fetch_image($email);
									$data_insert = [
											'email' => $email, 
											'password' => $password,
											'ref_user_level_id'	=> 3
											];
									$insert_user = User::create($data_insert);
									DataUser::create([
										'nama' 				=> $no4, 
										'mst_user_id' 		=> $insert_user->id,
										'alamat'			=> $no5,
										'no_hp'				=> $no6,
										'nama_ibu_kandung'	=> $no7,
										'no_ktp'			=> $no8,
										'tempat_lahir'		=> $no9,
										'tgl_lahir'			=> $no10,
										'ref_homebase_id'	=> $no11,
										]);
									$name = "user dgn email : ".$email.' telah ditambahkan';
								}
								 
 

		                       	$results[] = compact('name');
		         
		                    }
		                }
		            }
		            

					} catch(Exception $e) {
				 		$name = $file->getClientOriginalName().' gagal tersimpan!';
				 		$results[] = compact('name');   
			 		}
			 	
			 	//$results[] = compact('name');
			 }

 

	 return array(
	        'files' => $results,
  	    );	

 
	}




	public function export(){
		 
		Excel::create('data_user_'.Fungsi::date_to_tgl(date('Y-m-d')), function($excel) {
		    $excel->setTitle(env('NAMA_APP').' | Data User');
		    $excel->setCreator(Auth::user()->email)
		          ->setCompany(env('NAMA_APP'));
		    $excel->setDescription('generated from '.env('NAMA_APP'));

		    /* sheet awal */
		    $excel->sheet('Data User', function($sheet) {
		    	$sheet->setHeight([1 => 50, 2 => 27]);
		    	$sheet->row(1,['Data User | '.env('NAMA_APP')]);
				$sheet->row(2, [
					'No.',
					'Nama', 'Email', 'Nomor Induk', 'Alamat', 'tgl lahir',
					'Tempat Lahir', 'Jenis Kelamin', 'No HP', 'Kode POS',
					'no telp', 'no KTP', 'Nama Ibu Kandung', 'Status Ikatan',
					'Agama', 'Kota', 'Home Base', 'Status Pernikahan', 
					]);
				$sheet->cells('A1:R1', function($cells) {
					$cells->setFontSize(16);
				});
				$sheet->setBorder('A2:R2', 'thin');
				$sheet->cells('A2:R2', function($cells) {
					$cells->setBackground('#DDEEFF');
				});
				$sheet->setColumnFormat(['I' => '@']);


				/* start create data row */
				$i = 3;
					foreach(DataUser::all() as $list){

						
						$sheet->setHeight($i, 20);

						if($list->jenis_kelamin == 'L'){
							$jk = 'Laki-laki';
						}else{
							$jk = 'Perempuan';
						}

						if(count($list->mst_user)>0){ $email = $list->mst_user->email;	}else{ $email = '-'; }
						if(count($list->ref_kota)>0){	$kota = $list->ref_kota->nama;	}else{ $kota = '';	}
						
						if(count($list->ref_agama)>0){	$agama = $list->ref_agama->nama;	}else{ $agama = '';	}
						if(count($list->ref_status_ikatan)>0){	$status_ikatan = $list->ref_status_ikatan->nama;	}else{ $status_ikatan = '';	}
						if(count($list->ref_status_pernikahan)>0){	$status_pernikahan = $list->ref_status_pernikahan->nama;	}else{ $status_pernikahan = '';	}
						if(count($list->ref_homebase)>0){	$homebase = $list->ref_homebase->nama;	}else{ $homebase = '';	}


					$sheet->row($i, [
						$i-2,
						$list->nama, $list->mst_user->email, $list->no_induk, $list->alamat, Fungsi::date_to_tgl($list->tgl_lahir),
						$list->tempat_lahir, $jk, '"'.$list->no_hp.'"', $list->kode_post,
						 '"'.$list->no_telp.'"', '"'.$list->no_ktp.'"', $list->nama_ibu_kandung, $status_ikatan,
						$agama, $kota, $homebase, $status_pernikahan, 
						]);		

					


						$i++;
					}
				/* end create data row */
				


		    	$sheet->mergeCells('A1:R1');
		    	$sheet->setAutoSize(true);
				$sheet->setFreeze('A3');

		    });


		})->export('xls');	
	}




	public function show($id){
		$data_user = DataUser::find($id);
		return view($this->base_view.'popup.show', compact('data_user'));
	}


	/* reset password agar password sama dgn email */
	public function reset_password(){
		$user = User::find(Input::get('id'));
		if(count($user)>0){
			$user->password = $user->email;
			$user->save();
		}
		return 'ok';
	}



	public function change_avatar($id){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;	
		$user = User::findOrFail($id);	
		return view($this->base_view.'popup.change_avatar', compact('max_upload', 'user'));
	}

 	public function do_change_avatar(Request $request){
		$assetPath = '/upload/avatars';
		$uploadPath = public_path($assetPath);	
		$file =  $request->file('files');
		$results = [];

		try {
			$nama_file = md5($request->email).'.jpg';
		 	$file->move($uploadPath, $nama_file);
		 	
		 	$img = \Image::make($uploadPath.'/'.$nama_file);
			$img->resize(300, null, function ($constraint) {
			    $constraint->aspectRatio();
			});
			$img->save($uploadPath.'/'.$nama_file);

		 	$name = $file->getClientOriginalName().' telah tersimpan! ';
		}catch(Exception $e) {
	 		$name = $file->getClientOriginalName().' gagal tersimpan!';
	 		$results[] = compact('name');   
		}
		$results[] = compact('name');   
	 return array(
	        'files' => $results,
 	    );					
 	}




}