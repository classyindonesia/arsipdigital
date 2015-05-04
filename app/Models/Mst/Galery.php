<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Galery extends Eloquent{
	protected $table = 'mst_galery';
	protected $fillable = ['nama_file', 'mst_album_galery_id'];


 
	public function mst_album_galery(){
		return $this->belongsTo('\App\Models\Mst\AlbumGalery', 'mst_album_galery_id');
	}



}