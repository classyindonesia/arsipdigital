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
		$vars = compact('hits_minggu_ini');
		return view($this->base_view.'index', $vars);
	}

}
