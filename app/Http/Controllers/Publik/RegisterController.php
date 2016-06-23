<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Services\Register\submitAktivasiService;
use App\Services\Register\submitRegisterService;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\UserRegistrationRepoInterface;

class RegisterController extends Controller
{	
	private $base_view = 'konten.frontend.auth.register.';
	protected $user_registration;

	public function __construct(UserRegistrationRepoInterface $user_registration)
	{
		$this->user_registration = $user_registration;
		view()->share('frontend_register_home', true);
		view()->share('base_view', $this->base_view);
	}

    
    public function index()
    {
    	return view($this->base_view.'index');
    }


    public function submit_register(submitRegisterService $register)
    {
    	return $register->handle();
    }

    public function aktivasi($token)
    {
    	$filter = ['token' => $token];
    	$registration = $this->user_registration->findBy($filter);
        if(count($registration)<=0){
            abort(404);
        }
    	$vars = compact('registration');
    	return view($this->base_view.'aktivasi', $vars);
    }

    public function submit_aktivasi(submitAktivasiService $aktivasi)
    {
    	return $aktivasi->handle();
    }


}
