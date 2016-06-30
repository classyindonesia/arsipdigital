<?php

namespace Repo\Filters\Mst;

use App\MyPackages\QueryFilters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class HitsFilters extends QueryFilters
{


    public function search($value)
    {
	     return  $this->builder
	     			  ->where('ip', 'like', '%'.$value.'%');
    }


    public function order($order = 'desc')
    {
        return $this->builder->orderBy('id', $order);
    }

}