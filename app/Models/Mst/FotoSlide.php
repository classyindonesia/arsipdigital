<?php 

namespace App\Models\Mst;

use App\Models\Ref\Jabatan;
use Illuminate\Database\Eloquent\Model as Eloquent;


class FotoSlide extends Eloquent
{
	protected $table = 'mst_foto_slide';
	protected $fillable = ['nama', 'ref_jabatan_id', 'nama_file_asli', 'no_induk', 'mst_user_id'];


	public function ref_jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'ref_jabatan_id');
	}


}