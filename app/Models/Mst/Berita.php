<?php namespace App\Models\Mst;

use App\Models\Mst\BeritaToLampiran;
use App\Models\Mst\PasswordMedia;
use App\Models\Mst\User;
use App\MyPackages\QueryFilters\Filterable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Berita extends Eloquent 
{
	use Filterable;


    use Sluggable;



	protected $fillable = ['judul', 'slug', 'artikel',
					'is_published', 'komentar', 'mst_user_id',
					'mst_password_media_id', 'description', 'keyword'
		];
	protected $table = 'mst_berita';
	protected $appends = [
		'fk__mst_user'
	];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

	public function getMstPasswordMediaIdAttribute()
	{
		$val = $this->attributes['mst_password_media_id'];
		if($val == null || $val == 0){
			return null;
		}else{
			return $val;
		}
	}

    public function getFkMstUserAttribute()
    {

    	if(count($this->mst_user)>0){
    		if(count($this->mst_user->data_user)>0){
	    		return $this->mst_user->data_user->nama;    			
    		}
    	}
    }

    public function mst_password_media()
    {
    	return $this->belongsTo(PasswordMedia::class, 'mst_password_media_id');
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