<?php 

namespace App\Models\Mst;

use App\Models\Mst\LampiranBerita;
use Illuminate\Database\Eloquent\Model as Eloquent;

class BeritaToLampiran extends Eloquent 
{

	protected $fillable = ['mst_berita_id', 'mst_lampiran_berita_id'];
	protected $table = 'mst_berita_to_lampiran';




	public function mst_lampiran()
	{
		return $this->belongsTo(LampiranBerita::class, 'mst_lampiran_berita_id');
	}


}