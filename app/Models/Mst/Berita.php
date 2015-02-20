<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Berita extends Eloquent implements SluggableInterface{


    use SluggableTrait;



	protected $fillable = ['judul', 'slug', 'artikel',
					'is_published', 'komentar', 'mst_user_id'];
	protected $table = 'mst_berita';
    protected $sluggable = array(
        'build_from' => 'judul',
        'save_to'    => 'slug',
    );


	public function mst_user(){
		return $this->belongsTo('App\Models\Mst\User', 'mst_user_id');
	}

 

}