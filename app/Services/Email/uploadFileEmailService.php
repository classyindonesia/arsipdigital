<?php 

namespace App\Services\Email;

use App\Helpers\Fungsi;
use App\Models\Mst\AttachEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class uploadFileEmailService
{


	public function handle(Request $request)
	{
		$assetPath = '/attach/'.Auth::user()->id.'/';
		$uploadPath = storage_path($assetPath);
		$results = array();
		$files = $request->file('files');
			 foreach ($files as $file) {
				try {
						$size = $file->getSize();
					 	$name = $file->getClientOriginalName();
					 	$name = Fungsi::limit_karakter($name);
				    	$nama_file_db = str_slug($name, '.');
					 	$file->move($uploadPath, $nama_file_db);
					 	$name = $nama_file_db.' telah tersimpan! ';

					 	/* simpan ke DB */
					 	$data_insert = [
					 		'nama_file_asli'		=> $nama_file_db,
  					 		'mst_user_id'			=> Auth::user()->id
					 	];
					 	AttachEmail::create($data_insert);
					} catch(Exception $e) {
				 		$name = $file->getClientOriginalName().' gagal tersimpan!';
			 		}
			 	
			 	$results[] = compact('name');
			 }


	 return array(
	        'files' => $results
	    );			
	}

}