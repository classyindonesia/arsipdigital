<?php 
namespace App\Models\Mst;

use App\Models\Mst\Arsip;
use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\MyPackages\QueryFilters\Filterable;

class AksesStaff extends Eloquent 
{
	use Filterable;

	protected $fillable = ['mst_user_id', 'mst_user_staff_id'];
	protected $table = 'mst_akses_staff';

	protected $appends = ['jml_arsip_per_staff', 'file_size_per_staff'];


	public function getFileSizePerStaffAttribute()
	{
		$size = 0;
		$q =  $this->mst_user->mst_arsip;
		foreach($q as $list)
		{
			foreach($list->mst_file as $list_file)
			{
				$size = $size + $list_file->size;				
			}
		}
		return $size;
	}


	public function getJmlArsipPerStaffAttribute()
	{
		return $this->mst_user->mst_arsip->count();
	}

 
	public function mst_arsip()
	{
		return $this->hasMany(Arsip::class, 'mst_user_id', 'mst_user_id');
	} 

	public function mst_user_staff()
	{
		return $this->hasMany(self::class, 'mst_user_staff_id');
	}

	public function mst_user()
	{
		return $this->hasOne(User::class, $foreign_key = 'id', $local_key = 'mst_user_id');
	}



	

}