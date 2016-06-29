<?php 

namespace App\Services\Register;

use App\Models\Sms\Sms;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\FilterDomainRepoInterface;
use Repo\Contracts\Mst\UserRegistrationRepoInterface;

class submitRegisterService
{

	use ValidatesRequests;

	protected $request;
	protected $user_registration;
	protected $filter_domain;
	protected $sms;

	public function __construct(Request $request, 
								UserRegistrationRepoInterface $user_registration,
								FilterDomainRepoInterface $filter_domain,
								Sms $sms
			){
		$this->sms = $sms;
		$this->filter_domain = $filter_domain;
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

    	$checkValidEmailDomain = $this->checkDomain($this->request->email);
    	if($checkValidEmailDomain == 0){
    		// not valid
    		return response(['error' => 'domain dari email tidak dapat mendaftar!'], 422);
    	}

    	$this->sendSms($this->request->token, $this->request->no_hp);

    	$this->sendEmail($this->request->token);
    	return $this->user_registration->create($this->request->except('_token'));		
	}

	private function sendSms($token, $no_hp)
	{
		$config_sms = setup_variable('notif_sms_registrasi');
		if($config_sms == 1){
			$pesan = 'klik link berikut untuk aktivasi : '.url('register/aktivasi/'.$token);
			$data = [
				'pesan' => $pesan,
				'no_hp' => $no_hp,
				'statusKirim' => 0
			];
			$this->sms->create($data);
		}
	}

	private function checkDomain($email)
	{
		$arr_email = explode('@', $email);
		$domain = $arr_email[1];
		$checkFilter = $this->filter_domain->all(null, ['domain' => $domain]);
		if(count($checkFilter)>0){
			// ada
			return 1;
		}else{
			$jml_domain = $this->filter_domain->all();
			if(count($jml_domain)>0){
				//jika ada record, 
				//maka tdk diijinkan mendaftar dgn domain selain yg ada pada database
				return 0;
			}else{
				//jika tdk ada record sama sekali
				//maka bs mendaftar domain mana saja
				return 1;
			}
		}
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