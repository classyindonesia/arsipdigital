<?php 
namespace App\Models\Mst;

use App\Models\Mst\Arsip;
use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model as Eloquent;

class AksesStaff extends Eloquent 

{

	protected $fillable = ['mst_user_id', 'mst_user_staff_id'];
	protected $table = 'mst_akses_staff';
 
	public function mst_arsip()
	{
		return $this->hasMany(Arsip::class, 'mst_user_id', 'mst_user_id');
	} 


	public function mst_user()
	{
		return $this->hasMany(User::class, 'id', 'mst_user_id');
	}



	

}