<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;


class FotoSlide extends Eloquent{
	protected $table = 'mst_foto_slide';
	protected $fillable = ['nama', 'ref_jabatan_id', 'nama_file_asli', 'no_induk', 'mst_user_id'];


	public function ref_jabatan(){
		return $this->belongsTo('\App\Models\Ref\Jabatan', 'ref_jabatan_id');
	}


}