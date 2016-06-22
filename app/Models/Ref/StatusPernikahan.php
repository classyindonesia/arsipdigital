<?php 

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Model as Eloquent;


class StatusPernikahan extends Eloquent
{
	protected $table = 'ref_status_pernikahan';
	protected $fillable = ['nama'];
}