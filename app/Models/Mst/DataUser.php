<?php namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DataUser extends Eloquent {

	protected $fillable = ['nama', 'email'];
	protected $table = 'mst_data_user';

}