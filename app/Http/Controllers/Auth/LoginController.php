<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class LoginController extends Controller {


	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
		$this->middleware('guest', ['except' => 'getLogout']);
	}





}
