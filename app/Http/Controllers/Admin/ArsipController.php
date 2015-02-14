<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Auth;
use App\Models\Mst\Arsip;
use App\Models\Mst\File;
use App\Models\Mst\User;
use Illuminate\Http\Request; 

use Illuminate\Session\Store as Session;

class ArsipController extends Controller {
 

	public function __construct(Session $session){
		$this->session = $session;
		view()->share('arsip_home', true);
	}


	public function index(){
		if($this->session->has('pencarian_arsip')){
			$arsip = Arsip::with('mst_file', 'mst_folder', 'mst_user')
			->where('nama', 'like', '%'.$this->session->get('pencarian_arsip').'%')
			->orderBy('id', 'DESC')->paginate(10);
			if(count($arsip)<=0){
				//search by keterangan
				$arsip = Arsip::with('mst_file', 'mst_folder', 'mst_user')
				->where('keterangan', 'like', '%'.$this->session->get('pencarian_arsip').'%')
				->orderBy('id', 'DESC')->paginate(10);				
			}
			if(count($arsip)<=0){
				$arsip = Arsip::with('mst_file', 'mst_folder', 'mst_user')
				->where('kode_arsip', 'like', '%'.$this->session->get('pencarian_arsip').'%')
				->orderBy('id', 'DESC')->paginate(10);					
			}
		}else{
			$arsip = Arsip::with('mst_file', 'mst_folder', 'mst_user')->orderBy('id', 'DESC')->paginate(10);
		}
		return view('konten.backend.arsip.index', compact('arsip'));
	}


	public function upload_file(Arsip $arsip){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;
		$file = File::whereMstArsipId($arsip->id)->get();
		$user = User::find($arsip->mst_user_id)->data_user;
		$size = File::whereMstArsipId($arsip->id)->sum('size');
		return view('konten.backend.arsip.upload_file', compact('arsip', 'file', 'user', 'size', 'max_upload'));
	} 

	public function submit_search(Request $request){
		if($request->has('submit')){
			$this->session->put('pencarian_arsip', $request->input('pencarian'));
		}else{
			$this->session->forget('pencarian_arsip');
		}
		return 'ok';

	}


}