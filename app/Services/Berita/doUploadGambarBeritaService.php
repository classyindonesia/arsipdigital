<?php 

namespace App\Services\Berita;

use App\Helpers\Fungsi;
use App\Models\Mst\GambarBerita;

class doUploadGambarBeritaService
{


	public function handle()
	{
		$results = array();
		foreach(\Request::file('files') as $file){
			try{
				$assetPath = '/upload/gambar_berita';
				$uploadPath = public_path($assetPath);

				$name = $file->getClientOriginalName();
			 	$name = Fungsi::limit_karakter($name);
		    	$nama_file_db = str_slug($name, '.');
		    	$nama_file_to_server = md5($nama_file_db).'_'.date('YmdHis').'.'.$file->getClientOriginalExtension();			 	
			 	$file->move($uploadPath, $nama_file_to_server);
			 	$name = $file->getClientOriginalName().' telah tersimpan! ';				

			 	$data_insert = [
			 		'nama_file_asli'		=> $nama_file_to_server,
				 		'mst_user_id'			=> Auth::user()->id
			 	];
			 	GambarBerita::create($data_insert);


				// resize gambar
				$img = \Image::make(public_path('upload/gambar_berita/'.$nama_file_to_server));
				// prevent possible upsizing
				$img->resize(null, 400, function ($constraint) {
				    $constraint->aspectRatio();
				    $constraint->upsize();
				});
				$img->save();


			} catch(Exception $e) {
				 		$name = $file->getClientOriginalName().' gagal tersimpan!';
				 		//$results[] = compact('name');   
			 		}
		$results[] = compact('name');	
		}
	 return array(
	        'files' => $results,
 	    );			
	}

}