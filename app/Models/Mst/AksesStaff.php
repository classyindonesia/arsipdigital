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
 
	public function mst_arsip()
	{
		return $this->hasMany(Arsip::class, 'mst_user_id', 'mst_user_id');
	} 


	public function mst_user()
	{
		return $this->hasOne(User::class, $foreign_key = 'id', $local_key = 'mst_user_id');
	}



	

}