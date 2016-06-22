<?php 

namespace App\Models\Mst;

use App\Models\Mst\Arsip;
use App\Models\Mst\Folder;
use App\Models\Mst\Rak;
use Illuminate\Database\Eloquent\Model as Eloquent;
 
class Folder extends Eloquent
{

	protected $fillable = ['nama', 'parent_id', 'mst_user_id', 'mst_rak_id', 'keterangan'];
	protected $table = 'mst_folder';


	public function mst_arsip()
	{
		return $this->hasMany(Arsip::class, 'mst_folder_id');
	}




	public function mst_rak()
	{
		return $this->belongsTo(Rak::class, 'mst_rak_id');
	}


	public function child()
	{
		return $this->hasMany(Folder::class, 'parent_id');
	}

	public function parent()
	{
		return $this->belongsTo(Folder::class, 'parent_id');
	}
}