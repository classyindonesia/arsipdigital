<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

/* facade */
use Input, Auth, Hash;

class LoginController extends Controller {


	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function login(){
		return view('konten.frontend.auth.login.form_login_modal');
	}



	public function do_login(Request $request){
		$this->validate($request, [
			'email' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => 'These credentials do not match our records.',
					]);

	}


	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/';
	}


	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
	}


 


	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}


}
