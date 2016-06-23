<?php

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model;
use App\MyPackages\QueryFilters\Filterable;

class UserRegistration extends Model
{
	use Filterable;
	
    protected $table = 'mst_user_registration';
    protected $fillable = [
    	'nama', 'no_hp', 'email', 'token'
    ];

 

}
