<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Intervention\Image\Facades\Image; 

class Berita extends Eloquent {

	protected $fillable = ['judul', 'slug', 'artikel', 
					'is_published', 'komentar', 'mst_user_id'];
	protected $table = 'mst_berita';


	public function mst_arsip(){
		return $this->belongsTo('App\Models\Mst\User', 'mst_user_id');
	}

 

}