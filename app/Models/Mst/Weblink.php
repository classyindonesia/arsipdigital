<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Weblink extends Eloquent {

	protected $fillable = ['nama', 'mst_kategori_weblink_id', 'url'];
	protected $table = 'mst_weblink';
 


	public function mst_kategori_weblink(){
		return $this->belongsTo('\App\Models\Mst\KategoriWeblink', 'mst_kategori_weblink_id');
	}
 



}