<?php 

namespace App\Services\File;

use Repo\Contracts\Mst\ArsipRepoInterface;

class createZipService
{
	protected $arsip;

	public function __construct(ArsipRepoInterface $arsip)
	{
		$this->arsip = $arsip;
	}


	private function check_jml_file($mst_arsip_id)
	{
		$arsip = $this->arsip->find($mst_arsip_id);
		$files = [];
		foreach($arsip->mst_file as $list){
			if(file_exists(public_path('upload/arsip/'.$list->nama_file_tersimpan))){
				$files[] = $list->nama_file_tersimpan;
			}
		}
		return $files;
	}


	public function make($mst_arsip_id)
	{	
		$check = $this->check_jml_file($mst_arsip_id);
		if(count($check)<=0){
			return response('tidak ada file dlm arsip ini', 404);
		}

		$arsip = $this->arsip->find($mst_arsip_id);
		$nama_file = str_slug($arsip->nama).'_'.date('Y-m-d_Hi').'.zip';	
		$zip_path = storage_path('tmp/'.$nama_file);
		$zip = new \ZipArchive();
		$zip->open($zip_path, \ZipArchive::CREATE);		
		foreach($arsip->mst_file as $list){
			$path_to_file = public_path('upload/arsip/'.$list->nama_file_tersimpan);
			$name = $list->nama_file_asli;
			$zip->addFile($path_to_file, $name);			
		}
		$zip->close();
		return response()->download($zip_path)->deleteFileAfterSend(true);
	}


}