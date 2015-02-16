<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Mst\AksesStaff;
use App\Models\Mst\Arsip;

class ArsipUserController extends Controller{

	public function __construct(){
		view()->share('arsip_user_home', true);
	}


	public function index(){
		$arsip_user = AksesStaff::whereMstUserStaffId(Auth::user()->id)
		->with('mst_arsip')
		->paginate(10);
 		return view('konten.backend.arsip_user.index', compact('arsip_user'));
	}




}