<?php namespace App\Http\Middleware;

use Closure;
use Auth;

use App\Models\Mst\AksesStaff;
class StaffAccessToUserArchive {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

 		if (Auth::guest()){
			if($request->ajax()){
				return response('Unauthorized.', 401);
			}else{
				return redirect()->guest('/');
			}
		}else{
			if(Auth::user()->ref_user_level_id != 2){
				return response('Unauthorized.', 401);
			}else{
				$akses = AksesStaff::where('mst_user_staff_id', '=', Auth::user()->id)
				->where('mst_user_id', '=', $request->segment(3))
				->get();
				if(count($akses)<=0){
					return response('Unauthorized.', 401);
				}
			}
		}

		return $next($request);
	}

}
