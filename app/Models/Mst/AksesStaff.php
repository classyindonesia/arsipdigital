<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AksesStaff extends Eloquent {

	protected $fillable = ['mst_user_id', 'mst_user_staff_id'];
	protected $table = 'mst_akses_staff';

/*
	//get level user
	public function mst_user(){
		return $this->belongsToMany('\App\Models\Mst\User', 'id', 'mst_user_id');
	} 

*/
 
 

}