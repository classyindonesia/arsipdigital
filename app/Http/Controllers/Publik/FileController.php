<?php namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;

use App\Models\Mst\LampiranBerita;
use Illuminate\Http\Request;
 
class FileController extends Controller {


	public $base_view = 'konten.frontend.file.';

	public function __construct(){
		view()->share('daftar_file_home', true);
		view()->share('base_view', $this->base_view);
	}
 


	public function index(Request $request){
		$cari = $request->get('search');
		$hashids = new \Hashids\Hashids('qertymyr');
		if($cari){
			$file = LampiranBerita::where('nama', 'like', '%'.$cari.'%')->paginate(10);			
		}else{			
			$file = LampiranBerita::paginate(10);
		}
 		return view($this->base_view.'index', compact('file', 'hashids'));	
	}

 


}