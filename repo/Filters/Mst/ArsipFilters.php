<?php

namespace Repo\Filters\Mst;

use App\MyPackages\QueryFilters\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class ArsipFilters extends QueryFilters
{
 

    public function search($value)
    {
    	// query berdasarkan tabel relasi
    	return $this->builder->whereHas('mst_file', function($query) use ($value){
    		$query->where('nama_file_asli', 'like',  '%'.$value.'%');
    	});
    }

    public function userId($value)
    {
    	return $this->builder->where('mst_arsip.mst_user_id', '=', $value);
    }


    public function order($order = 'desc')
    {
        return $this->builder->orderBy('mst_arsip.id', $order);
    }

}