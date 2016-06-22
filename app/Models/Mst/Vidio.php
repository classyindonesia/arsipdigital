<?php 

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Vidio extends Eloquent 
{

	protected $fillable = ['nama_file_asli', 'mst_user_id'];
	protected $table = 'mst_vidio';

 

 


}