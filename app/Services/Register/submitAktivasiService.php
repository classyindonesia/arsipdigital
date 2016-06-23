<?php 

namespace App\Services\Register;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\DataUserRepoInterface;
use Repo\Contracts\Mst\UserRegistrationRepoInterface;
use Repo\Contracts\Mst\UserRepoInterface;

class submitAktivasiService
{

	use ValidatesRequests;

	protected $request;
	protected $user_registration;
	protected $user;
	protected $data_user;

	public function __construct(Request $request, 
								UserRegistrationRepoInterface $user_registration,
								UserRepoInterface $user,
								DataUserRepoInterface $data_user
							){
		$this->data_user = $data_user;
		$this->user = $user;
		$this->request = $request;
		$this->user_registration = $user_registration;
	}


	public function handle()
	{
		$this->validate($this->request, [
			'password'	=> 'required|confirmed',
			'email'		=> 'unique:mst_users,email'
		]);

		return $this->create_user();
	}

	private function create_user()
	{
    	$filter = ['token' => $this->request->token];
    	$registration = $this->user_registration->findBy($filter);

    	// insert ke tabel mst_users
    	$data_insert_user = [
    		'email'	=> $this->request->email,
    		'password'	=> $this->request->password,
    		'ref_user_level_id' => 3
    	];
    	$insert_user = $this->user->create($data_insert_user);

    	// insert ke tabel mst_data_user
    	$data_user_registration = [
    		'mst_user_id' => $insert_user->id, 
    		'nama' => $registration->nama,
    		'no_hp'	=> $registration->no_hp
    	];
    	$this->data_user->create($data_user_registration);

    	// hapus token
    	$registration->delete();

    	\Auth::loginUsingId($insert_user->id, true);

    	return $insert_user;
	}

}