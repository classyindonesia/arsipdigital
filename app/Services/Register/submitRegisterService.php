<?php 

namespace App\Services\Register;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\UserRegistrationRepoInterface;

class submitRegisterService
{

	use ValidatesRequests;

	protected $request;
	protected $user_registration;

	public function __construct(Request $request, UserRegistrationRepoInterface $user_registration)
	{
		$this->request = $request;
		$this->user_registration = $user_registration;
	}

	public function handle()
	{
    	$this->validate($this->request, [
    		'nama'	=> 'required',
    		'email'	=> 'required|email|unique:mst_users,email',
    		'no_hp'	=> 'required|numeric|unique:mst_data_user,no_hp'
    	]);

    	$this->sendEmail($this->request->token);
    	return $this->user_registration->create($this->request->except('_token'));		
	}

	private function sendEmail($token)
	{
		$email = $this->request->email;
		$pesan_email = 'klik link berikut untuk aktivasi : '.url('register/aktivasi/'.$token);

		\Mail::raw($pesan_email, function ($message) use ($email){
			$message->subject('verifikasi pendaftaran');
		    $message->from(env('MAIL_USERNAME'), env('MAIL_SENDER_NAME'));
		    $message->to($email);
		});

	}

}