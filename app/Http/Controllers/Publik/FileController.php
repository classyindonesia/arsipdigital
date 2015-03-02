<?php namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;

use App\Models\Mst\LampiranBerita;
 
class FileController extends Controller {

	public function __construct(){
		view()->share('daftar_file_home', true);
	}
 


	public function index(){
		$hashids = new \Hashids\Hashids('qertymyr');
		$file = LampiranBerita::paginate(10);
 		return view('konten.frontend.file.index', compact('file', 'hashids'));	
	}

 


}