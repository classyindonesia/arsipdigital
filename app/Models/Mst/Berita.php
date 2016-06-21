<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\Sluggable;

class Berita extends Eloquent {


    use Sluggable;



	protected $fillable = ['judul', 'slug', 'artikel',
					'is_published', 'komentar', 'mst_user_id'];
	protected $table = 'mst_berita';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

 

	public function mst_user(){
		return $this->belongsTo('App\Models\Mst\User', 'mst_user_id');
	}

	public function berita_to_lampiran(){
		return $this->hasMany('\App\Models\Mst\BeritaToLampiran', 'mst_berita_id');
	}

 

}