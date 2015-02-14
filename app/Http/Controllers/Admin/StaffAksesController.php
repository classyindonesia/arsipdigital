<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* models */
use App\Models\Mst\User;
use App\Models\Mst\AksesStaff;

class StaffAksesController extends Controller{

	public function __construct(){
		view()->share('staff_akses_home', true);
	}

	public function index(){
		$staff_user = User::where('ref_user_level_id', '=', 2)
		->with('staff_user')->paginate(10);
		return view('konten.backend.staff_akses.index', compact('staff_user'));
	}


	public function list_user($id){
		$list_user = User::find($id)->staff_user;
		return view('konten.backend.staff_akses.popup.list_user', compact('list_user'));
	}

	public function del_akses(Request $request){
		$o = AksesStaff::whereMstUserId($request->input('id'))
			->whereMstUserStaffId($request->input('mst_user_staff_id'))->first();
		$o->delete();
		return 'ok';
	}

	public function add_list_user($id){
		$list_user = User::find($id);

		return view('konten.backend.staff_akses.popup.add_list_user', compact('list_user'));
	}

	public function update_akses(Request $request){
		$o = AksesStaff::whereMstUserId($request->input('mst_user_id'))
			->whereMstUserStaffId($request->input('mst_user_staff_id'))
			->first();
		if(count($o)>0){
			$o->delete();
		}else{
			$i = [
				'mst_user_staff_id' => $request->input('mst_user_staff_id'),
				'mst_user_id'	=> $request->input('mst_user_id')
			];
			AksesStaff::create($i);
		}
		return 'ok';
	}



}