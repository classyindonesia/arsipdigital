<?php 

namespace App\Services\Arsip;

use App\Models\Mst\File;
use Illuminate\Http\Request;

class delFileArsipService
{
	protected $request;
	protected $file;

	public function __construct(Request $request, File $file)
	{
		$this->file = $file;
		$this->request = $request;
	}

	public function handle()
	{
		$file = File::find($this->request->input('id'));
		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);
		$path_file = $uploadPath.'/'.$file->nama_file_tersimpan;
		if(file_exists($path_file)){
			unlink($path_file);
		}
		$this->file->remove_watermark_file($file->nama_file_tersimpan);
		$file->delete();
		return 'ok';
	}
	
}