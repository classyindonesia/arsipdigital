<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArsip;
use App\Http\Requests\UpdateArsip;
use App\Jobs\ArsipUser\sendFileArsipToEmailJob;
use App\Jobs\ArsipUser\sendSingleFileArsipToEmail;
use App\Models\Mst\Arsip;
use App\Models\Mst\File;
use App\Models\Mst\Folder;
use App\Models\Mst\User;
use App\Services\Arsip\delArsipService;
use App\Services\Arsip\delFileArsipService;
use App\Services\Arsip\doUploadFileArsipService;
use App\Services\File\createZipService;
use Auth, Fungsi;
use Illuminate\Http\Request;
use Illuminate\Session\Store as Session;
use Repo\Contracts\Mst\ArsipRepoInterface;
use Repo\Contracts\Mst\FileRepoInterface;


class ArsipSayaController extends Controller {

	private $perPage = 10;
	protected $arsip;
	protected $file;
	private $base_view = 'konten.backend.arsip_saya.';
 
	public function __construct(Session $session, 
								ArsipRepoInterface $arsip,
								FileRepoInterface $file
	){
		$this->file = $file;
		$this->arsip = $arsip;
		$this->session = $session;
		view()->share('my_archive', true);
		view()->share('base_view', $this->base_view);
	}



	public function index(){
		$my_archive_home = true;
		$filter = ['userId' => \Auth::user()->id];
		if($this->session->has('pencarian_arsip')){
			// jika ada session pencarian arsip
			$search_value = $this->session->get('pencarian_arsip');
			$add_filter = ['search' => $search_value];		
			$filter = array_merge($filter, $add_filter);			
		}
		$arsip = $this->arsip->all($this->perPage, $filter);
		$vars = compact('arsip', 'my_archive_home');
		return view($this->base_view.'index', $vars);
	}

	public function files($mst_arsip_id)
	{
		$arsip = $this->arsip->find($mst_arsip_id);
		$arsip_home = true;
		$vars = compact('arsip', 'arsip_home');
		return view($this->base_view.'files.index', $vars);
	}



	public function add(){
		$folder = Folder::all();
		return view($this->base_view.'popup.add', compact('folder'));
	}



	public function edit(Arsip $arsip){
		$folder = Folder::all();
		return view($this->base_view.'popup.edit', compact('folder', 'arsip'));
	}



	public function insert(CreateArsip $request){
		if($request->mst_user_id == NULL){
			$mst_user_id = Auth::user()->id;
		}else{
			$mst_user_id = $request->mst_user_id;
		}
		$data = [
				'nama'			=> $request->nama, 
				'kode_arsip'	=> $request->mst_folder_id, 
				'keterangan'	=> $request->keterangan, 
				'mst_folder_id'	=> $request->mst_folder_id, 
				'mst_user_id'	=> $mst_user_id, 
				'tgl_arsip'		=> $request->tgl_arsip,
				'tgl_surat'		=> $request->tgl_surat, 
				'no_surat'		=> $request->no_surat, 
				'nama_tujuan'	=> $request->nama_tujuan
		];
		Arsip::create($data);
		return 'ok';
	}


	public function update(UpdateArsip $request){
		$this->arsip->update($request->id, $request->except('_token'));
		return 'ok';
	}




	public function del(delArsipService $delArsip)
	{
		return $delArsip->handle();
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

	
	public function list_file_raw($id){
		$file = File::whereMstArsipId($id)->get();
		return view($this->base_view.'list_file_uploaded', compact('file'));
	}


	public function do_upload_file(doUploadFileArsipService $uploadService){
		return $uploadService->handle();
	}


	public function hapus_file(delFileArsipService $delFileArsip){
		return $delFileArsip->handle();
	}

	/* param = id file table */
	public function download_file($id){
		$file = File::find($id);
		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);
		$file_path = $uploadPath.'/'.$file->nama_file_tersimpan;		
		return response()->download($file_path, $file->nama_file_asli);
	}



	/**
	 * download file beserta watermark
	 * @param  [int] $id mst_file.id
	 * @param  File   $f  [description]
	 * @return [type]     [description]
	 */
	public function download_file_watermark($id, downloadFileWatermarkService $df){
		return $df->handle($id);
	}



	public function before_download($id, File $f){
		$file = File::find($id);
		$assetPath = '/upload/arsip/watermark';
		$uploadPath = public_path($assetPath);	
		if(!file_exists($uploadPath.'/'.$file->nama_file_tersimpan)){
			$f->handle_file($file->nama_file_tersimpan);			
		}

		if(!file_exists(public_path('upload/arsip/'.$file->nama_file_tersimpan))){
			return 'file tdk ditemukan atau sudah terhapus';
		}

		$cek = $f->get_jenis_eksternsi($file->nama_file_tersimpan);		
		return view($this->base_view.'popup.before_download', compact('file', 'cek'));
	}


	public function view_file($id, File $file){
		$file = $file->find($id);
		$cek = $file->get_jenis_eksternsi($file->nama_file_tersimpan);
		if($cek == 1 || $cek == 2){
			return view($this->base_view.'file.view', compact('file', 'cek'));
		}else{
			abort(403, 'Unauthorized action.');
		}
		
	}



	/* khusus view file pdf */
	public function view_file_pdf($id, File $file){
		$file = $file->find($id);
		$cek = $file->get_jenis_eksternsi($file->nama_file_tersimpan);
		if($cek == 2){
			return view($this->base_view.'file.view_pdf_full', compact('file', 'cek'));
		}else{
			abort(403, 'Unauthorized action.');
		}
	}


	public function download_all_files($mst_arsip_id, createZipService $create)
	{
		return $create->make($mst_arsip_id);
	}

	public function send_to_email($mst_arsip_id)
	{
		$arsip = $this->arsip->find($mst_arsip_id);

		$size = $arsip->mst_file->sum('size');
		$max_size = sendFileArsipToEmailJob::SIZE_FILE_ARSIP;
		if($size > $max_size){
			return 'ukuran file melebihi batas maksimal : '.\Fungsi::size($max_size);
		}

		return view($this->base_view.'popup.send_arsip_to_email', compact('arsip'));
	}

	public function do_send_to_email(Request $request)
	{
		$job = new sendFileArsipToEmailJob($request->email, $request->mst_arsip_id);
		return $this->dispatch($job);		
	}

	public function send_file_to_email($mst_file_id)
	{
		$file = $this->file->find($mst_file_id);
		$vars = compact('file');
		return view($this->base_view.'popup.send_file_to_email', $vars);
	}

	public function do_send_file_to_email(Request $request)
	{
		$this->validate($request, ['email' => 'required|email']);
		$job = new sendSingleFileArsipToEmail($request->email, $request->mst_file_id); 
		return $this->dispatch($job);
	}


 
}
