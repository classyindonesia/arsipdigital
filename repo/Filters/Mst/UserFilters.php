<?php

namespace Repo\Filters\Mst;

use App\MyPackages\QueryFilters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class UserFilters extends QueryFilters
{
 
 	public function level($ref_user_level_id)
 	{
 		$this->builder->where('ref_user_level_id', '=', $ref_user_level_id);
 	}

    public function search($value)
    {
	     return  $this->builder
	     			  ->where('email', 'like', '%'.$value.'%');
    }


    public function order($order = 'desc')
    {
        return $this->builder->orderBy('id', $order);
    }

}