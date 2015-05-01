<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GaleryController extends Controller {

	
	public $base_view = 'konten.backend.galery.';
	public function __construct(){
		view()->share('base_view', $this->base_view);
		view()->share('galery_home', true);
	}

	public function index(){
		return view($this->base_view.'index');
	}

}
