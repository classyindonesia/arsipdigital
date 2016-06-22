<?php 

namespace App\Services\Arsip;

use App\Http\Requests\Request;
use App\Models\Mst\Arsip;
use App\Models\Mst\File;
use Repo\Contracts\Mst\ArsipRepoInterface;

class delArsipService 
{
	protected $request;
	protected $file;
	protected $arsip;

	public function __construct(Request $request, File $file, ArsipRepoInterface $arsip)
	{
		$this->arsip = $arsip;
		$this->file = $file;
		$this->request = $request;
	}

	public function handle()
	{
		$o = $this->arsip->find($this->request->id);
		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);
		$file  = $this->file->whereMstArsipId($this->request->id)->get();
		foreach($file as $list){
			$path_file = $uploadPath.'/'.$list->nama_file_tersimpan;
			if(file_exists($path_file)){
				unlink($path_file);
			}
			$this->file->remove_watermark_file($list->nama_file_tersimpan);		
			$list->delete();	
		}
		$o->delete();
		return 'ok';
	}
}