<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;
 
class GambarBerita extends Eloquent {

	protected $fillable = ['mst_user_id', 'nama_file_asli'];
	protected $table = 'mst_gambar_berita';




}