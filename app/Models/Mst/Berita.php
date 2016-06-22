<?php namespace App\Models\Mst;

use App\Models\Mst\BeritaToLampiran;
use App\Models\Mst\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Berita extends Eloquent 
{


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

 

	public function mst_user()
	{
		return $this->belongsTo(User::class, 'mst_user_id');
	}

	public function berita_to_lampiran()
	{
		return $this->hasMany(BeritaToLampiran::class, 'mst_berita_id');
	}

 

}