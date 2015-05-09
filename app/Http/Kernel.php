<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
		'App\Http\Middleware\HitsWebsite'
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' 						=> 'App\Http\Middleware\Authenticate',
		'auth.basic' 				=> 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' 					=> 'App\Http\Middleware\RedirectIfAuthenticated',
		'hanya_admin' 				=> 'App\Http\Middleware\HanyaAdmin',
		'hanya_user'				=> 'App\Http\Middleware\HanyaUser',
		'hanya_staff'				=> 'App\Http\Middleware\HanyaStaff',
		'hanya_web'					=> 'App\Http\Middleware\HanyaLevelWeb',
		'akses_file'				=> 'App\Http\Middleware\AksesFileUser',
		'akses_ke_arsip_user'		=> 'App\Http\Middleware\StaffAccessToUserArchive',
		'akses_pencarian_publik'	=> 'App\Http\Middleware\AksesPencarianPublik',
		'akses_password_publik'		=> 'App\Http\Middleware\AksesResetPasswordPublik',
		'akses_galery_frontend'		=> 'App\Http\Middleware\aksesGaleryFrontend'
	];

}
