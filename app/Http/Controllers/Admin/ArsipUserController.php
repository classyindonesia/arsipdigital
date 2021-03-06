<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ArsipUser\sendFileArsipToEmailJob;
use App\Models\Mst\AksesStaff;
use App\Models\Mst\Arsip;
use App\Models\Mst\File;
use App\Models\Mst\Folder;
use App\Models\Mst\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Session\Store as Session;
use Repo\Contracts\Mst\ArsipRepoInterface;


class ArsipUserController extends Controller{

	private $base_view = 'konten.backend.arsip_user.';
	protected $arsip;
	private $perPage = 10;

	public function __construct(Session $session, ArsipRepoInterface $arsip){
		$this->session = $session;
		$this->arsip = $arsip;
		view()->share('base_view', $this->base_view);
		view()->share('arsip_user_home', true);
	}


	public function index(){
		$arsip_user = AksesStaff::whereMstUserStaffId(Auth::user()->id)->paginate(10);
 		return view($this->base_view.'index', compact('arsip_user'));
	}

	public function send_to_email($mst_user_id, $mst_arsip_id)
	{
		$arsip = $this->arsip->find($mst_arsip_id);
		$vars = compact('arsip');
		return view($this->base_view.'list_arsip.popup.send_to_email', $vars);
	}

	public function do_send_to_email(Request $request)
	{
		$job = new sendFileArsipToEmailJob($request->email, $request->mst_arsip_id);
		return $this->dispatch($job);
	}

	public function list_arsip($mst_user_id){
		$filter = ['userId' => $mst_user_id];
		if($this->session->has('pencarian_arsip')){
			$search_value = $this->session->get('pencarian_arsip');
			$add_filter = ['search' => $search_value];		
			$filter = array_merge($filter, $add_filter);			
		}
		$arsip = $this->arsip->all($this->perPage, $filter);
		$user = User::find($mst_user_id);		
		$vars = compact('arsip', 'user');
		return view($this->base_view.'list_arsip.index', $vars);
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
		return view($this->base_view.'list_file_uploaded', compact('file'));
	}


	public function add($id){
		$folder = Folder::all();
		return view($this->base_view.'list_arsip.popup.add', compact('folder'));
	}


}