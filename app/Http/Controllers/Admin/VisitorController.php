<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\HitsRepoInterface;

class VisitorController extends Controller
{
	protected $hits;

	private $base_view = 'konten.backend.visitors.';

	public function __construct(HitsRepoInterface $hits)
	{
		$this->hits = $hits;
		view()->share('backend_visitors_home', true);
		view()->share('base_view', $this->base_view);
	}    


	public function index()
	{
		$hits_minggu_ini = $this->hits->countThisWeek();
		$hits_minggu_kemarin = $this->hits->countLastWeek();
		$hits_minggu_sebelumnya = $this->hits->countPrevWeek();
		$hits_hari_ini = $this->hits->countThisDay();
		$hits_kemarin = $this->hits->countYesterday();
		$hits_hari_sebelumnya = $this->hits->countPrevDay();
		$hits_bulan_ini = $this->hits->countThisMonth();
		$hits_bulan_kemarin = $this->hits->countLastMonth();
		$hits_bulan_sebelumnya = $this->hits->countPrevMonth();
		
		$vars = compact(
			'hits_minggu_ini', 'hits_minggu_kemarin', 'hits_minggu_sebelumnya',
			'hits_hari_ini', 'hits_kemarin', 'hits_hari_sebelumnya',
			'hits_bulan_ini', 'hits_bulan_kemarin', 'hits_bulan_sebelumnya'
		);
		return view($this->base_view.'index', $vars);
	}

}
