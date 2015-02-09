<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DataUser extends Eloquent {

	protected $fillable = [
						'nama', 'mst_user_id', 'no_induk', 'alamat',
						'tgl_lahir', 'tempat_lahir', 'jenis_kelamin',
						'no_hp', 'kode_post', 'no_telp', 'no_ktp',
						'nama_ibu_kandung', 'ref_status_ikatan_id',
						'ref_agama_id', 'ref_kota_id', 'ref_status_pernikahan_id',
						];

	protected $table = 'mst_data_user';

}