<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mst\Arsip;
use App\Models\Mst\File;
use App\Models\Mst\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Session\Store as Session;
use Repo\Contracts\Mst\ArsipRepoInterface;

class ArsipController extends Controller {
 
 	private $perPage = 10;
 	private $base_view = 'konten.backend.arsip.';
 	protected $arsip;

	public function __construct(Session $session, ArsipRepoInterface $arsip){
		$this->session = $session;
		$this->arsip = $arsip;
		view()->share('arsip_home', true);
	}


	public function index(){
		$filter = ['order' => 'desc'];
		if($this->session->has('pencarian_arsip')){
			// jika ada session pencarian arsip
			$search_value = $this->session->get('pencarian_arsip');
			$add_filter = ['search' => $search_value];		
			$filter = array_merge($filter, $add_filter);			
		}
		$arsip = $this->arsip->all($this->perPage, $filter);
		return view($this->base_view.'index', compact('arsip'));
	}


	public function upload_file(Arsip $arsip){
		$max = explode('M', ini_get("upload_max_filesize"));
		$max_upload = $max[0] * 1048576;
		$file = File::whereMstArsipId($arsip->id)->get();
		$user = User::find($arsip->mst_user_id)->data_user;
		$size = File::whereMstArsipId($arsip->id)->sum('size');
		$vars = compact('arsip', 'file', 'user', 'size', 'max_upload');
		return view($this->base_view.'upload_file', $vars);
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