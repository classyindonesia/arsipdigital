<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DataUser extends Eloquent {

	protected $fillable = [
						'nama', 'mst_user_id', 'no_induk', 'alamat',
						'tgl_lahir', 'tempat_lahir', 'jenis_kelamin',
						'no_hp', 'kode_post', 'no_telp', 'no_ktp',
						'nama_ibu_kandung', 'ref_status_ikatan_id',
						'ref_agama_id', 'ref_kota_id', 'ref_status_pernikahan_id', 'ref_homebase_id',
						];

	protected $table = 'mst_data_user';

	public function mst_user(){
		return $this->hasOne('\App\Models\Mst\User', 'id', 'mst_user_id');
	}

	public function ref_kota(){
		return $this->belongsTo('\App\Models\Ref\Kota', 'ref_kota_id');
	}


	

	public function ref_agama(){
		return $this->belongsTo('\App\Models\Ref\Agama', 'ref_agama_id');
	}

	public function ref_homebase(){
		return $this->belongsTo('\App\Models\Ref\HomeBase', 'ref_homebase_id');
	}

	public function ref_status_ikatan(){
		return $this->belongsTo('\App\Models\Ref\StatusIkatan', 'ref_status_ikatan_id');
	}

	public function ref_status_pernikahan(){
		return $this->belongsTo('\App\Models\Ref\StatusPernikahan', 'ref_status_pernikahan_id');
	}



}