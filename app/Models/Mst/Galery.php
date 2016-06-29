<?php

namespace App\Models\Mst;

use App\Models\Mst\AlbumGalery;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Galery extends Eloquent
{
	protected $table = 'mst_galery';
	protected $fillable = [
		'nama_file', 'mst_album_galery_id', 'is_watermarked'
	];


 
	public function mst_album_galery()
	{
		return $this->belongsTo(AlbumGalery::class, 'mst_album_galery_id');
	}



}