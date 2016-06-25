<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\AksesStaff;
use App\Models\Mst\User;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\AksesStaffRepoInterface;
use Repo\Contracts\Mst\UserRepoInterface;

class StaffAksesController extends Controller{

	private $base_view = 'konten.backend.staff_akses.';
	protected $user;
	protected $akses_staff;

	public function __construct(UserRepoInterface $user, AksesStaffRepoInterface $akses_staff){
		$this->akses_staff = $akses_staff;
		$this->user = $user;
		view()->share('base_view', $this->base_view);
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
		$user = User::whereRefUserLevelId(3)->get();
		return view('konten.backend.staff_akses.popup.add_list_user', compact('list_user', 'user'));
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

	public function insert_all_user(Request $request)
	{
		$user = $this->user->all(null, ['level' => 3]);
		foreach($user as $list){
			$filter_check = ['userId' => $list->id, 'Akses' => $request->mst_user_staff_id];
			$check = $this->akses_staff->all(null, $filter_check);
			if(count($check)<=0){
				$data = ['mst_user_id' => $list->id, 'mst_user_staff_id' => $request->mst_user_staff_id];
				$this->akses_staff->create($data);				
			}
		}
		return 'ok';
	}



}