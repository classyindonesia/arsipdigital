<?php 

namespace App\Models\Mst;

use App\Models\Mst\Galery;
use Illuminate\Database\Eloquent\Model as Eloquent;


class AlbumGalery extends Eloquent
{

	protected $table = 'mst_album_galery';
	protected $fillable = ['judul', 'keterangan', 'mst_password_media_id'];


 
	public function mst_galery()
	{
		return $this->hasMany(Galery::class, 'mst_album_galery_id');
	}





}