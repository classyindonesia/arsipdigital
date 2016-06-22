<?php

namespace Repo\Filters\Mst;

use App\MyPackages\QueryFilters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class UserFilters extends QueryFilters
{
 

    public function search($value)
    {
               $this->builder->where('nama', 'like', '%'.$value.'%');
        return $this->builder->orWhere('no_hp', 'like', '%'.$value.'%');
    }


    public function order($order = 'desc')
    {
        return $this->builder->orderBy('id', $order);
    }

}