<?php 

namespace App\Services\Galery;

use App\Models\Mst\Galery;
use Illuminate\Http\Request;

class deleteImageService
{

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}
	

	public function handle()
	{
		$g = Galery::findOrFail($this->request->id);

		//hapus gambar asli
			$path = public_path('upload/galery/'.$g->nama_file);
			if(file_exists($path)){
				unlink($path);
			}			

			//hapus thumbnail
			$path2 = public_path('upload/galery/thumbnail_'.$g->nama_file);
			if(file_exists($path2)){
				unlink($path2);
			}			
		$g->delete();				
		return 'ok';		
	}

}