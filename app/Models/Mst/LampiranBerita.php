<?php 

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\MyPackages\QueryFilters\Filterable;

class LampiranBerita extends Eloquent 
{
	use Filterable;

	protected $fillable = ['nama' ,'nama_file_asli', 'nama_file_tersimpan', 
					  'mst_user_id', 'size', 'deskripsi'];
	protected $table = 'mst_lampiran_berita';




	}