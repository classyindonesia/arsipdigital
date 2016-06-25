<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Services\StaffAkses\exportStaffUserService;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\AksesStaffRepoInterface;
use Repo\Contracts\Mst\UserRepoInterface;

class StaffUserController extends Controller
{
    
    public $akses_staff;
    public $user;
    private $base_view = 'konten.backend.akses_staff_user.';

    public function __construct(AksesStaffRepoInterface $akses_staff, UserRepoInterface $user)
    {
    	$this->user = $user;
    	view()->share('base_view', $this->base_view);
    	view()->share('backend_staff_user_home', true);
    	$this->akses_staff = $akses_staff;
    }

    public function index(Request $request)
    {
    	$filter = ['Akses' => \Auth::user()->id];
    	$search = $request->get('search');
    	if($search){
    		$filter = array_merge($filter, ['search' => $search]);
    	}
    	$akses = $this->akses_staff->all(10, $filter);
    	$vars = compact('akses');
    	return view($this->base_view.'index', $vars);
    }    


    public function do_export(exportStaffUserService $export)
    {
    	return $export->handle($mst_user_staff_id = \Auth::user()->id);
    }

    public function view_user_data($mst_user_id)
    {
    	$user = $this->user->find($mst_user_id);
    	$data_user = $user->data_user;
    	$vars = compact('data_user', 'user');
    	return view($this->base_view.'popup.show', $vars);
    }

}
