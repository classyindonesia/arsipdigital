<?php

namespace App\Models\Mst;

use Illuminate\Database\Eloquent\Model;
use App\MyPackages\QueryFilters\Filterable;

class FilterDomainRegistrasi extends Model
{
	use Filterable;
	
	protected $table = 'mst_filter_domain_registrasi';
	protected $fillable = ['nama', 'domain'];

	

}
