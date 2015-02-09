<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateMyProfile;



/*models */
use App\Models\Ref\StatusPernikahan;
use App\Models\Ref\StatusIkatan;
use App\Models\Ref\Agama;
use App\Models\Ref\Kota;
use App\Models\Mst\DataUser;

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

		$d->save();

		return 'ok';

 	}


 }