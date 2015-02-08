<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Folder extends Eloquent {

	protected $fillable = ['nama', 'email', 'mst_user_id'];
	protected $table = 'mst_data_user';

}