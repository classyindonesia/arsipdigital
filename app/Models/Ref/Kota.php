<?php 

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Kota extends Eloquent
{
	protected $table = 'ref_kota';
	protected $fillable = ['nama'];
}