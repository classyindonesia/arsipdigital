<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*models */
use App\Models\Ref\StatusPernikahan;
use App\Models\Ref\StatusIkatan;
use App\Models\Ref\Agama;
use App\Models\Ref\Kota;

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


 }