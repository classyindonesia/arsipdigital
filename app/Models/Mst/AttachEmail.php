<?php 

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;
 
class AttachEmail extends Eloquent 
{

	protected $fillable = ['mst_user_id', 'nama_file_asli'];
	protected $table = 'mst_attach_email';




}