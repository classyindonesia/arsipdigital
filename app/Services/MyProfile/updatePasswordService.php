<?php 

namespace App\Services\MyProfile;

use App\Http\Requests\UpdatePassword;
use App\Models\Mst\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class updatePasswordService
{

	protected $request;

	public function __construct(UpdatePassword $request)
	{
		$this->request = $request;
	}


	public function handle()
	{
 		$old_password = Auth::user()->password;
 		if (Hash::check($this->request->password_lama, $old_password)){
			    // The passwords match...
 				$u = User::find(Auth::user()->id);
 				$u->password = $this->request->password_baru;
 				$u->save();
 				return 'ok';
			}else{
		 		$response = ['error' => 'password salah! '];
		 		return response()->json($response, 422);				
			}		
	}

}