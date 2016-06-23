<?php

namespace Repo\Filters\Mst;

use App\MyPackages\QueryFilters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class UserRegistrationFilters extends QueryFilters
{
 

    public function search($value)
    {
	     return  $this->builder
	     			  ->where('email', 'like', '%'.$value.'%')
	     			  ->orWhere('nama', 'like', '%'.$value.'%');
    }

    public function token($token)
    {
        return $this->builder->where('token', '=', $token);
    }

    /**
     * expired selama sehari
     * @return [type] [description]
     */
    public function expired($now)
    {
        return $this->builder->where('created_at', '<', $now);
    }


    public function order($order = 'desc')
    {
        return $this->builder->orderBy('id', $order);
    }

}