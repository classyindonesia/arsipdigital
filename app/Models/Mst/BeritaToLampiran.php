<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class BeritaToLampiran extends Eloquent {

	protected $fillable = ['mst_berita_id', 'mst_lampiran_berita_id'];
	protected $table = 'mst_berita_to_lampiran';



}