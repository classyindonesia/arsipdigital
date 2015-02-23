<?php namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use App\Models\Mst\File;
class AksesFileUser {


	protected $auth;

 
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}




	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		$level = $this->auth->user()->ref_user_level_id;


		if ($this->auth->guest()){
			if($request->ajax()){
				return response('Unauthorized.', 401);
			}else{
				return redirect()->guest('/');
			}
		}else{
			if( $level == 3){
				$file = File::find($request->segment(3));
				if($file->mst_user->id != $this->auth->user()->id){
					return response('Unauthorized.', 401);
				}
			}elseif($level == 2){
				return $next($request);	
			}else{
				return $next($request);

			}	
		}






	}

}
