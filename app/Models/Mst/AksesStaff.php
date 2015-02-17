<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AksesStaff extends Eloquent {

	protected $fillable = ['mst_user_id', 'mst_user_staff_id'];
	protected $table = 'mst_akses_staff';
 
	public function mst_arsip(){
		return $this->hasMany('\App\Models\Mst\Arsip', 'mst_user_id', 'mst_user_id');
	} 


	public function mst_user(){
		return $this->hasMany('\App\Models\Mst\User', 'id', 'mst_user_id');
	}



	

}