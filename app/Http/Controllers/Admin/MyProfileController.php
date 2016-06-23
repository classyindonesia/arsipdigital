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
use App\Services\MyProfile\exportExcelProfileService;
use App\Services\MyProfile\updatePasswordService;
use App\Services\MyProfile\uploadAvatarService;
use Hash, Auth, Image;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\DataUserRepoInterface;

class MyProfileController extends Controller
{
 	
 	protected $data_user;
 	private $base_view = 'konten.backend.my_profile.';

	public function __construct(DataUserRepoInterface $data_user)
	{
		view()->share('base_view', $this->base_view);
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
 		return view($this->base_view.'index', $vars);
 	}

 	public function update(UpdateMyProfile $request){
 		$this->data_user->update($request->id, $request->except('_token'));
		return 'ok';
 	}

 	public function change_avatar(){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576; 		
		$vars = compact('max_upload');
 		return view($this->base_view.'popup.form_change_avatar', $vars);
 	}

 	public function do_change_avatar(uploadAvatarService $upload){
		return $upload->handle();
 	}

 	public function change_password(){
 		return view($this->base_view.'popup.change_password');
 	}

 	public function update_password(updatePasswordService $update){
 		return $update->handle();
 	}

 	public function export_profile_excel(exportExcelProfileService $export)
 	{
 		return $export->handle(\Auth::user()->id);
 	}

 }