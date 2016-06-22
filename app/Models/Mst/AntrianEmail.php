<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AntrianEmail extends Eloquent 
{

	protected $fillable = ['mst_user_id', 'email'];
	protected $table = 'mst_antrian_email';
 

 



}