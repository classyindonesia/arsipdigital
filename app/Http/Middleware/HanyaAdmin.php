<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class HanyaAdmin {

 
	protected $auth;

 
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}



	public function handle($request, Closure $next)
	{
		if ($this->auth->guest()){
			if($request->ajax()){
				return response('Unauthorized.', 401);
			}else{
				return redirect()->guest('/');
			}
		}else{
			if($this->auth->user()->ref_user_level_id != 1){
				return response('Unauthorized.', 401);
			}			
		}

		return $next($request);
	}

}
