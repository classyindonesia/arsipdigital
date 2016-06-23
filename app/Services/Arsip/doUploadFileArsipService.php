<?php 

namespace App\Services\Arsip;
use App\Helpers\Fungsi;
use App\Models\Mst\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Repo\Contracts\Mst\ArsipRepoInterface;

class doUploadFileArsipService
{

	protected $request;
	protected $arsip;

	public function __construct(Request $request, ArsipRepoInterface $arsip)
	{
		$this->arsip = $arsip;
		$this->request = $request;
	}


	public function handle()
	{	
		$mst_arsip_id = $this->request->mst_arsip_id;
		$arsip = $this->arsip->find($mst_arsip_id);

		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);
		$results = array();
		$files = $this->request->file('files');
			 foreach ($files as $file) {
				try {
					// $name = $arsip->nama.'_'.date('Y-m-d H:i');		
						$size = $file->getSize();
					 	// $name = $file->getClientOriginalName();					 	
					 	// $name = pathinfo($name, PATHINFO_FILENAME);
					 	// $name = str_limit($name, 40, '').'_'.date('Y-m-d H:i');		
					 	$name = $arsip->nama.'_'.\Fungsi::date_to_tgl(date('Y-m-d')).'_'.date('H-i-s');				 	
				    	$nama_file_db = str_slug($name, '_').'.'.$file->getClientOriginalExtension();

				    	$nama_file_to_server = md5($nama_file_db).'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();			 	
					 	$file->move($uploadPath, $nama_file_to_server);
					 	$name = $file->getClientOriginalName().' telah tersimpan dengan nama : '.$nama_file_db;

					 	/* simpan ke DB */
					 	$data_insert = [
					 		'nama_file_asli'		=> $nama_file_db,
					 		'nama_file_tersimpan'	=> $nama_file_to_server,
					 		'size'					=> $size,//bytes
					 		'mst_arsip_id'			=> $mst_arsip_id,
					 		'mst_user_id'			=> Auth::user()->id
					 	];
					 	File::create($data_insert);

					 	$f = new File;
					 	$f->handle_file($nama_file_to_server);
					} catch(Exception $e) {
				 		$name = $file->getClientOriginalName().' gagal tersimpan!';
				 		//$results[] = compact('name');   
			 		}
			 	
			 	$results[] = compact('name');
			 }

		 $size_all_files = File::whereMstArsipId($this->request->input('mst_arsip_id'))->sum('size');
		 return array(
		        'files' => $results,
		        'jml_file'	=> File::whereMstArsipId($this->request->input('mst_arsip_id'))->count(),
		        'size_all_files'	=> Fungsi::size($size_all_files)
		    );				
	}

}