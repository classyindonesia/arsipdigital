<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;


class AlbumGalery extends Eloquent{
	protected $table = 'mst_album_galery';
	protected $fillable = ['judul', 'keterangan'];


 
	public function mst_galery(){
		return $this->hasMany('\App\Models\Mst\Galery', 'mst_album_galery_id');
	}





}