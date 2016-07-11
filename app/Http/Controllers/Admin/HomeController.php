<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\AksesStaff;
use App\Models\Mst\Arsip;
use App\Models\Mst\Berita;
use App\Models\Mst\File;
use App\Models\Mst\Folder;
use App\Models\Mst\LampiranBerita;
use App\Models\Mst\Rak;
use App\Models\Mst\User;
use Auth;
use Repo\Contracts\Mst\AlbumGaleryRepoInterface;
use Repo\Contracts\Mst\BeritaRepoInterface;
use Repo\Contracts\Mst\LampiranBeritaRepoInterface;

class HomeController extends Controller {
 
 	protected $berita;
 	protected $lampiran_berita;
 	protected $album_galery;

	public function __construct(BeritaRepoInterface $berita, 
								LampiranBeritaRepoInterface $lampiran_berita,
								AlbumGaleryRepoInterface $album_galery
		){
		$this->album_galery = $album_galery;
		view()->share('dashboard_home', true);
		$this->berita = $berita;
		$this->lampiran_berita = $lampiran_berita;
	}



	public function index(){
		if(Auth::check()){
			//is logged in
			if(Auth::user()->ref_user_level_id == 1){
				//level admin
				return $this->level_admin();
			}elseif(Auth::user()->ref_user_level_id == 2){
				//level staff
				return $this->level_staff();	
			}elseif(Auth::user()->ref_user_level_id == 4){
				// level web
				return $this->level_web();
			}else{
				//level user
				return $this->level_user();			
			}
		}else{
			return $this->public_access();
		}
	}

	public function level_web()
	{
		$jml_berita = $this->berita->count();
		$jml_lampiran_berita = $this->lampiran_berita->count();
		$jml_album_galery = $this->album_galery->count();
		$berita = $this->berita->all(10);
    	$vars = compact('jml_berita', 'jml_lampiran_berita', 
    					'jml_album_galery', 'berita'
    	);
		$view = 'konten.backend.home.web.index';	
		return view($view, $vars);			
	}



	private function public_access(){
		$berita = Berita::orderBy('id', 'DESC')->whereIsPublished(1)->take(8)->get();
		return view('konten.frontend.auth.login.index', compact('berita'));
	}




	private function level_admin(){
		$jml_user 	= User::count();
		$jml_rak	= Rak::count();
		$jml_folder	= Folder::count();
		$jml_file = File::count();			
		$jml_arsip = Arsip::count();
		$jml_size = File::sum('size');
		$view = 'konten.backend.home.admin.index';
		return view($view,	compact('jml_user', 'jml_rak', 'jml_folder', 'jml_file', 'jml_arsip', 'jml_size'));		
	}

	private function level_staff(){
		$user_id = Auth::user()->id;
		$jml_arsip = $this->jml_arsip_staff($user_id);
		$jml_file = $this->jml_file_staff($user_id);
		$jml_berita = Berita::count();
		$size_file = $this->getFileSize($user_id);
		$jml_user = AksesStaff::whereMstUserStaffId($user_id)->count();
		$berita_terakhir = Berita::take(5)->orderBy('id', 'DESC')->get();
		$view = 'konten.backend.home.staff.index';	
		$vars = compact('jml_arsip', 'jml_file', 'jml_user', 
						'jml_berita', 'berita_terakhir', 'size_file');
		return view($view, $vars);			
	}

	private function level_user(){
		$arsip = Arsip::whereMstUserId(Auth::user()->id)->orderBy('id', 'DESC')->with('mst_file')
		->take(10)
		->get();
		
		$jml_arsip = Arsip::where('mst_user_id', '=', Auth::user()->id)->count();
		$jml_file = File::where('mst_user_id', '=', Auth::user()->id)->count();
    	$jml_size = File::where('mst_user_id', '=', Auth::user()->id)->sum('size');
		$view = 'konten.backend.home.user.index';	
		return view($view, compact('arsip', 'jml_arsip', 'jml_file', 'jml_size'));	
	}


 



	/**
	* menghitung arsip yg ada di user staff(berdasarkan akses yg dimiliki)
	* return Int
	*/
	private function jml_arsip_staff($mst_user_id){
		$jml_arsip = 0;
		$q =  AksesStaff::where('mst_user_staff_id', '=', $mst_user_id)
						 ->get();
		foreach($q as $list)
		{
			$jml_arsip = $jml_arsip + $list->jml_arsip_per_staff;
		}
		return $jml_arsip;
	}

	private function getFileSize($mst_user_id)
	{
		$size = 0;
		$q =  AksesStaff::where('mst_user_staff_id', '=', $mst_user_id)
						 ->get();
		foreach($q as $list)
		{
			$size = $size + $list->file_size_per_staff;
		}
		return $size;		
	}


	/**
	* menghitung jml file yg ada di user staff(berdasarkan akses yg dimiliki)
	* return Int
	*/
	private function jml_file_staff($mst_user_id){
		$jml_file = 0;
		$as = AksesStaff::where('mst_user_staff_id', '=', $mst_user_id)->get();
		foreach($as as $list){
			$arsip_per_user = Arsip::whereMstUserId($list->mst_user_id)->with('mst_file')->get();
			foreach($arsip_per_user as $list2){
				//$jml_arsip = $jml_arsip+1;
				$jml_file = $jml_file + count($list2->mst_file);
			}
		}
		return $jml_file;		
	}

 
}
