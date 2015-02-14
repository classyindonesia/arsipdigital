<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);
		require app_path('Providers/model_binding/homebase.php');
		require app_path('Providers/model_binding/mst_arsip.php');

		//
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
			require app_path('Http/routes/admin_home.php');
			require app_path('Http/routes/admin_users.php');
			require app_path('Http/routes/admin_rak.php');
			require app_path('Http/routes/admin_folder.php');
			require app_path('Http/routes/admin_data_ref.php');
			require app_path('Http/routes/ref/agama.php');
			require app_path('Http/routes/ref/homebase.php');
			require app_path('Http/routes/ref/status_pernikahan.php');
			require app_path('Http/routes/ref/kota.php');
			require app_path('Http/routes/ref/status_ikatan.php');
			require app_path('Http/routes/my_profile.php');
			require app_path('Http/routes/rak_user.php');
			require app_path('Http/routes/arsip.php');
			require app_path('Http/routes/staff_akses.php');



			/* hanya utk user */
			require app_path('Http/routes/user/arsip_saya.php');
			require app_path('Http/routes/user/list_folder.php');
		});
	}

}
