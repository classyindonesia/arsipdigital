<?php namespace App\Http\Middleware;

use Closure;
use App\Models\Mst\Hit;

class HitsWebsite {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next){
		$data_insert = [
			'ip'		=> $request->getClientIp(),
			'tgl'		=> date('Y-m-d'),
			'timevisit'	=> time(),
			'_token'	=> csrf_token()
		];
		Hit::create($data_insert);

		return $next($request);
	}

}
