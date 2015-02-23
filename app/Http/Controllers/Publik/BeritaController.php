<?php namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;


/* models */
use App\Models\Mst\LampiranBerita;
use App\Models\Mst\Berita;

class BeritaController extends Controller {
 


	public function public_berita($slug){
		$berita = Berita::findBySlug($slug);
		if($berita->is_published == 0){
			abort(404);
		}

		return view('konten.frontend.berita.index', compact('berita'));
	}


	public function download_lampiran($id){
		$f = LampiranBerita::find($id);
		if(count($f)>0){
			return response()->download(storage_path('lampiran/'.$f->nama_file_tersimpan), $f->nama_file_asli);			
		}else{
			abort(404);
		}		
	}

 }