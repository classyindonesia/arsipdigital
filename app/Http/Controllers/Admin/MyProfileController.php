<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMyProfile;
use App\Http\Requests\UpdatePassword;
use App\Models\Mst\DataUser;
use App\Models\Mst\User;
use App\Models\Ref\Agama;
use App\Models\Ref\Kota;
use App\Models\Ref\StatusIkatan;
use App\Models\Ref\StatusPernikahan;
use App\Services\MyProfile\uploadAvatarService;
use Hash, Auth, Image;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\DataUserRepoInterface;

class MyProfileController extends Controller
{
 	
 	protected $data_user;

	public function __construct(DataUserRepoInterface $data_user)
	{
		$this->data_user = $data_user;
		view()->share('my_profile', true);
	}

 	public function index()
 	{
 		$agama = Agama::all();
 		$kota = Kota::all();
 		$ref_status_pernikahan = StatusPernikahan::all();
 		$ref_status_ikatan = StatusIkatan::all();
 		$vars = compact(
	 			'ref_status_ikatan', 'data_user', 'ref_status_pernikahan',
	 			'agama', 'kota'
 			);
 		return view('konten.backend.my_profile.index', $vars);
 	}

 	public function update(UpdateMyProfile $request){
 		$this->data_user->update($request->id, $request->except('_token'));
		return 'ok';
 	}

 	public function change_avatar(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576; 		
 		return view('konten.backend.my_profile.popup.form_change_avatar', compact('max_upload'));
 	}

 	public function do_change_avatar(uploadAvatarService $upload){
		return $upload->handle();
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