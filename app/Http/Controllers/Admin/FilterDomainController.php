<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\FilterDomainRepoInterface;

class FilterDomainController extends Controller
{
	protected $filter_domain;
	protected $request;
    private $base_view = 'konten.backend.filter_domain_registrasi.';

    public function __construct(FilterDomainRepoInterface $filter_domain, Request $request)
    {
    	$this->request = $request;
    	$this->filter_domain = $filter_domain;
    	view()->share('backend_filter_domain', true);
    	view()->share('base_view', $this->base_view);
    }


    public function index()
    {
    	$search = $this->request->get('search');
    	if($search){
    		$filter_search = ['search' => $search];
    	}else{
    		$filter_search = [];
    	}
    	$filter = $this->filter_domain->all(10, $filter_search);
    	$vars = compact('filter');
    	return view($this->base_view.'index', $vars);
    }

    public function add()
    {
    	return view($this->base_view.'popup.add');
    }

    public function insert()
    {
    	$this->validate($this->request, [
    		'nama'	=> 'required',
    		'domain'	=> 'required'
    	]);
    	return $this->filter_domain->create($this->request->except('_token'));
    }

    public function edit($id)
    {
    	$filter = $this->filter_domain->find($id);
    	$vars = compact('filter');
    	return view($this->base_view.'popup.edit', $vars);
    }

    public function update()
    {
    	$this->validate($this->request, [
    		'nama'	=> 'required',
    		'domain'	=> 'required'
    	]);
    	return $this->filter_domain->update($this->request->id, $this->request->except('_token'));    	
    }

    public function delete()
    {
    	return $this->filter_domain->delete($this->request->id);
    }

}
