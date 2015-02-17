<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Mst\AksesStaff;
use App\Models\Mst\Arsip;

use App\Models\Mst\User;
use App\Models\Mst\File;
use App\Models\Mst\Folder;
use Illuminate\Session\Store as Session;


class ArsipUserController extends Controller{

	public function __construct(Session $session){
		$this->session = $session;
		view()->share('arsip_user_home', true);
	}


	public function index(){
		$arsip_user = AksesStaff::whereMstUserStaffId(Auth::user()->id)
		->with('mst_user', 'mst_arsip')
		->paginate(10);


 		return view('konten.backend.arsip_user.index', compact('arsip_user'));
	}

	public function list_arsip($id){
		if($this->session->has('pencarian_arsip')){
			$arsip = Arsip::whereMstUserId($id)->orderBy('id', 'DESC')
				->where('nama', 'like', '%'.$this->session->get('pencarian_arsip').'%')
				->with('mst_file')
				->paginate(10);
			if(count($arsip)<=0){
				$arsip = Arsip::whereMstUserId($id)->orderBy('id', 'DESC')
					->where('kode_arsip', 'like', '%'.$this->session->get('pencarian_arsip').'%')
					->with('mst_file')
					->paginate(10);				
			}
			if(count($arsip)<=0){
				$arsip = Arsip::whereMstUserId($id)->orderBy('id', 'DESC')
					->where('keterangan', 'like', '%'.$this->session->get('pencarian_arsip').'%')
					->with('mst_file')
					->paginate(10);
			}

		}else{
			$arsip = Arsip::whereMstUserId($id)->orderBy('id', 'DESC')
				->paginate(10);			
		}
		$user = User::find($id);
		
		return view('konten.backend.arsip_user.list_arsip.index', compact('arsip', 'user'));
	}

	public function upload_file($id, $mst_arsip_id){
		$arsip = Arsip::find($mst_arsip_id);
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;
		$file = File::whereMstArsipId($mst_arsip_id)->get();
		$user = User::find($id)->data_user;
		$size = File::whereMstArsipId($mst_arsip_id)->sum('size');
		return view('konten.backend.arsip_user.list_arsip.upload_file', 
					compact('arsip', 'file', 'user', 'size', 'max_upload'));
	} 


	public function list_file_raw($id, $mst_arsip_id){
		$file = File::whereMstArsipId($mst_arsip_id)->get();
		return view('konten.backend.arsip_saya.list_file_uploaded', 
					compact('file'));
	}


	public function add($id){
		$folder = Folder::all();
		return view('konten.backend.arsip_user.list_arsip.popup.add', compact('folder'));
	}


}