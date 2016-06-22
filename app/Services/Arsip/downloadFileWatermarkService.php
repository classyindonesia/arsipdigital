<?php 

namespace App\Services\Arsip;

use App\Models\Mst\File;

class downloadFileWatermarkService 
{
	protected $file;
	public function __construct(File $file)
	{
		$this->file = $file;
	}


	public function handle($mst_file_id)
	{
		$q_file = File::find($mst_file_id);
		$assetPath = '/upload/arsip/watermark';
		$uploadPath = public_path($assetPath);	

		if(!file_exists($uploadPath.'/'.$q_file->nama_file_tersimpan)){
			$this->file->handle_file($q_file->nama_file_tersimpan);
		}		

		$cek = $this->file->get_jenis_eksternsi($q_file->nama_file_tersimpan);
		if($cek != 1){
			abort(403, 'Unauthorized action.');
		}	
		return response()->download($uploadPath.'/'.$q_file->nama_file_tersimpan, $q_file->nama_file_asli);
	}

}