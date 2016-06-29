<?php

namespace Repo\Filters\Mst;

use App\MyPackages\QueryFilters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class FileFilters extends QueryFilters
{
 
 	public function arsipId($mst_arsip_id)
 	{
 		$this->builder->where('mst_arsip_id', '=', $mst_arsip_id);
 	}

    public function search($value)
    {
	     return  $this->builder
	     			  ->where('nama_file_asli', 'like', '%'.$value.'%');
    }


    public function order($order = 'desc')
    {
        return $this->builder->orderBy('id', $order);
    }

}