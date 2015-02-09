<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;
 
class Folder extends Eloquent {

	protected $fillable = ['nama', 'parent_id', 'mst_user_id', 'mst_rak_id', 'keterangan'];
	protected $table = 'mst_folder';




	public function mst_rak(){
		return $this->belongsTo('\App\Models\Mst\Rak', 'mst_rak_id');
	}


	public function child(){
		return $this->hasMany('\App\Models\Mst\Folder', 'parent_id');
	}

	public function parent(){
		return $this->belongsTo('\App\Models\Mst\Folder', 'parent_id');
	}
}