<?php 

namespace App\Services\Arsip;
use App\Helpers\Fungsi;
use App\Models\Mst\File;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class doUploadFileArsipService
{


	public function handle(Request $request, Filesystem $filesystem)
	{
		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);
		$results = array();
		$files = $request->file('files');
			 foreach ($files as $file) {
				try {
						$size = $file->getSize();
					 	$name = $file->getClientOriginalName();
					 	$name = Fungsi::limit_karakter($name);
				    	$nama_file_db = str_slug($name, '.');
				    	$nama_file_to_server = md5($nama_file_db).'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();			 	
					 	$file->move($uploadPath, $nama_file_to_server);
					 	$name = $file->getClientOriginalName().' telah tersimpan! ';

					 	/* simpan ke DB */
					 	$data_insert = [
					 		'nama_file_asli'		=> $nama_file_db,
					 		'nama_file_tersimpan'	=> $nama_file_to_server,
					 		'size'					=> $size,//bytes
					 		'mst_arsip_id'			=> $request->input('mst_arsip_id'),
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

		 $size_all_files = File::whereMstArsipId($request->input('mst_arsip_id'))->sum('size');
		 return array(
		        'files' => $results,
		        'jml_file'	=> File::whereMstArsipId($request->input('mst_arsip_id'))->count(),
		        'size_all_files'	=> Fungsi::size($size_all_files)
		    );				
	}

}