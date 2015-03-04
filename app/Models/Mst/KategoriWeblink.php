<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class KategoriWeblink extends Eloquent {

	protected $fillable = ['nama'];
	protected $table = 'mst_kategori_weblink';
 


	public function mst_weblink(){
		return $this->hasMany('\App\Models\Mst\Weblink', 'mst_kategori_weblink_id');
	}
 



}