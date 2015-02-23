<?php namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;



class PenggunaController extends Controller {

	public function __construct(){
		view()->share('pencarian_pengguna_home', true);
	}
 


	public function index(){
		return view('konten.frontend.pengguna.index');
	}


}