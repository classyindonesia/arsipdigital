<?php

namespace Repo\Filters\Mst;

use App\MyPackages\QueryFilters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class AksesStaffFilters extends QueryFilters
{
 	
 	public function search($value)
 	{
 		return $this->builder->whereHas('mst_user', function($query) use ($value){
    		$query->where('email', 'like',  '%'.$value.'%');
    		$query->orWhereHas('data_user', function($query2) use ($value){
    			$query2->where('nama', 'like',  '%'.$value.'%');	
    		});
    	});
 	}

    public function Akses($mst_user_staff_id)
    {
	     return  $this->builder->where('mst_user_staff_id', '=', $mst_user_staff_id);
    }


    public function order($order = 'desc')
    {
        return $this->builder->orderBy('id', $order);
    }

}