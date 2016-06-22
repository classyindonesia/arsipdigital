<?php 

namespace App\Services\AlbumGalery;

use App\Models\Mst\AlbumGalery;
use Illuminate\Http\Request;

class DelAlbumService 
{

	public function handle(Request $request)
	{
		$a = AlbumGalery::findOrFail($request->id);
		foreach($a->mst_galery as $list){
			//hapus gambar asli
			$path = public_path('upload/galery/'.$list->nama_file);
			if(file_exists($path)){
				unlink($path);
			}			

			//hapus thumbnail
			$path2 = public_path('upload/galery/thumbnail_'.$list->nama_file);
			if(file_exists($path2)){
				unlink($path2);
			}			
			$list->delete();
		}

		$a->delete();
		return 'ok';		
	}

}