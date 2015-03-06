<?php namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Jabatan extends Eloquent{
	protected $table = 'ref_jabatan';
	protected $fillable = ['nama'];
}