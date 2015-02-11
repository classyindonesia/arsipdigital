<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;
 
class File extends Eloquent {

	protected $fillable = ['nama', 'nama_file_asli', 'nama_file_tersimpan', 
					'mst_arsip_id', 'mst_user_id', 'size'];
	protected $table = 'mst_file';


	public function mst_arsip(){
		return $this->belongsTo('App\Models\Mst\Arsip', 'mst_arsip_id');
	}



}