<?php 

namespace App\Services\Arsip;

use App\Models\Mst\File;
use Illuminate\Http\Request;

class delFileArsipService
{


	public function handle(Request $request)
	{
		$file = File::find($request->input('id'));
		$assetPath = '/upload/arsip';
		$uploadPath = public_path($assetPath);
		$path_file = $uploadPath.'/'.$file->nama_file_tersimpan;
		if(file_exists($path_file)){
			unlink($path_file);
		}
		$f->remove_watermark_file($file->nama_file_tersimpan);
		$file->delete();
		return 'ok';
	}
	
}