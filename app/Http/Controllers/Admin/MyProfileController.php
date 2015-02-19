<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateMyProfile;
use App\Http\Requests\UpdatePassword;

use Hash, Auth, Image;

/*models */
use App\Models\Ref\StatusPernikahan;
use App\Models\Ref\StatusIkatan;
use App\Models\Ref\Agama;
use App\Models\Ref\Kota;
use App\Models\Mst\DataUser;
use App\Models\Mst\User;
 class MyProfileController extends Controller {
 

	public function __construct(){
		view()->share('my_profile', true);
	}

 	public function index(){
 		$agama = Agama::all();
 		$kota = Kota::all();
 		$ref_status_pernikahan = StatusPernikahan::all();
 		$ref_status_ikatan = StatusIkatan::all();
 		return view('konten.backend.my_profile.index', compact(
 			'ref_status_ikatan',
 			'data_user',
 			'ref_status_pernikahan',
 			'agama',
 			'kota'
 			));
 	}

/*   
	 
 	'ref_agama_id', 'ref_kota_id', 'ref_status_pernikahan_id',

 */
 	public function update(UpdateMyProfile $req){
		$d = DataUser::find($req->id);
		$d->nama 						= $req->nama;
		$d->no_induk 					= $req->no_induk;
		$d->alamat						= $req->alamat;
		$d->tgl_lahir					= $req->tgl_lahir;
		$d->tempat_lahir				= $req->tempat_lahir;
		$d->jenis_kelamin				= $req->jenis_kelamin;
		$d->no_hp 						= $req->no_hp;
		$d->kode_post 					= $req->kode_post;
		$d->no_telp 					= $req->no_telp;
		$d->no_ktp 						= $req->no_ktp;
		$d->nama_ibu_kandung			= $req->nama_ibu_kandung;
		$d->ref_status_ikatan_id 		= $req->ref_status_ikatan_id;
		$d->ref_status_pernikahan_id 	= $req->ref_status_pernikahan_id;
		$d->ref_agama_id 				= $req->ref_agama_id;
		$d->ref_kota_id 				= $req->ref_kota_id;
		$d->ref_homebase_id				= $req->ref_homebase_id;

		$d->save();

		return 'ok';
 	}



 	public function change_avatar(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576; 		
 		return view('konten.backend.my_profile.popup.form_change_avatar', compact('max_upload'));
 	}


 	public function do_change_avatar(Request $request){
		$assetPath = '/upload/avatars';
		$uploadPath = public_path($assetPath);	
		$file =  $request->file('files');
		$results = [];

		try {
			$nama_file = md5(Auth::user()->email).'.jpg';
		 	$file->move($uploadPath, $nama_file);
		 	
		 	$img = Image::make($uploadPath.'/'.$nama_file);
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



 	public function change_password(){
 		return view('konten.backend.my_profile.popup.change_password');
 	}

 	public function update_password(UpdatePassword $request){
 		$old_password = Auth::user()->password;
 		if (Hash::check($request->password_lama, $old_password)){
			    // The passwords match...
 				$u = User::find(Auth::user()->id);
 				$u->password = $request->password_baru;
 				$u->save();
 				return 'ok';
			}else{
		 		$response = ['error' => 'password salah! '];
		 		return response()->json($response, 422);				
			}
 	}

 }