<?php

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model;
use App\MyPackages\QueryFilters\Filterable;

class PasswordMedia extends Model
{
	use Filterable;
	
    protected $table = 'mst_password_media';
    protected $fillable = [
    	'nama', 'password'
    ];
}
