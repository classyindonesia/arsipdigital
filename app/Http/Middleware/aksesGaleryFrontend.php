<?php namespace App\Http\Middleware;

use Closure, SetupVariable;

class aksesGaleryFrontend {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$sv = new SetupVariable;
		$val = $sv->get_val('config_show_galery');
		if($val == 0){
			abort(404);
		}		
		return $next($request);
	}

}
