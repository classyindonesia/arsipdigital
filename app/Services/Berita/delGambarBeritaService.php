<?php 

namespace App\Services\Berita;

use App\Models\Mst\GambarBerita;
use Illuminate\Support\Facades\Input;

class delGambarBeritaService
{

	public function handle()
	{
		$o = GambarBerita::find(Input::get('id'));

		$path = public_path('upload/gambar_berita/'.$o->nama_file_asli);
		if(file_exists($path)){
 			unlink($path);
		} 
		$o->delete();
		return 'ok';		
	}
}