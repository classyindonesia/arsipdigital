<?php 

namespace App\Models\Mst;

use App\Models\Mst\Galery;
use App\Models\Mst\PasswordMedia;
use App\MyPackages\QueryFilters\Filterable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class AlbumGalery extends Eloquent
{
	use Filterable;

	protected $table = 'mst_album_galery';
	protected $fillable = ['judul', 'keterangan', 'mst_password_media_id'];


 
	public function mst_galery()
	{
		return $this->hasMany(Galery::class, 'mst_album_galery_id');
	}

	public function mst_password_media()
	{
		return $this->belongsTo(PasswordMedia::class, 'mst_password_media_id');
	}



}