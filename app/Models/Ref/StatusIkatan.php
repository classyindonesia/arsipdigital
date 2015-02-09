<?php namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Model as Eloquent;


class StatusIkatan extends Eloquent{
	protected $table = 'ref_status_ikatan';
	protected $fillable = ['nama'];
}