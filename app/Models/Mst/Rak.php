<?php namespace App\Models\Mst

use Illuminate\Database\Eloquent\Model as Eloquent;

class Rak extends Eloquent {

	protected $fillable = ['nama', 'kode_rak'];
	protected $table = 'mst_rak';

}