<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\User;
use App\Models\Mst\DataUser;
use App\Models\Ref\UserLevel;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;


use Illuminate\Http\Request;

class UserController extends Controller{


	public function __construct(){
		view()->share('users_home', true);
	}


	public function index(){
		$users = User::with('data_user')->paginate(10);
		return view('konten.backend.users.index', compact('users'));
	}


	public function add(){
		$level = UserLevel::all();
		return view('konten.backend.users.popup.add', compact('level'));
	}

	public function insert(CreateUser $request, User $users, DataUser $data_user){
		/* START insert ke tabel mst_users */
			$data_insert = [
			'email'	=> $request->email,
			'password'	=>  $request->password,
			'ref_user_level_id'	=> $request->ref_user_level_id,
			];
			$insert = $users->create($data_insert);
		/* END insert ke tabel mst_users */


		/* START insert ke tabel mst_data_user */
			$data_user_insert = [
				'nama'	=> $request->nama,
				'mst_user_id'	=> $insert->id
			];
			$data_user->create($data_user_insert);
		/* END insert ke tabel mst_data_user */
	return 'ok';
	}





	public function edit($id){
		$level = UserLevel::all();
		$user = User::with('data_user')->whereId($id)->first();
		return view('konten.backend.users.popup.edit', compact('level', 'user'));
	}


	public function update(UpdateUser $request){
		$u = User::find($request->user_id);
		$u->email = $request->email;
		$u->ref_user_level_id = $request->level;
		$u->save();

		//update data user
		$du = DataUser::find($request->user_data_id);
		$du->nama = $request->nama;
		$du->save();
		return $request->all();
	}


		public function del(Request $request){
			$o = User::find($request->input('id'));
			$o->delete();
			return 'ok';
		}
	


}