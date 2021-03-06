<?php

namespace Repo\Filters\Mst;

use App\MyPackages\QueryFilters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class FilterDomainFilters extends QueryFilters
{
 

    public function search($value)
    {
      return $this->builder
           		  ->where('nama', 'like', '%'.$value.'%');
    }

    public function domain($domain)
    {
    	return $this->builder->where('domain', '=', $domain);
    }


    public function order($order = 'desc')
    {
        return $this->builder->orderBy('id', $order);
    }

}