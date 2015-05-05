<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\createMenu;
use App\Models\Mst\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller {



	public $base_view = 'konten.backend.menu.';
	public function __construct(){
		view()->share('base_view', $this->base_view);
		view()->share('menu_home', true);
	}


	public function index(){
		$menu = Menu::whereParentId(0)->with('mst_menu_child')->paginate(10);
		return view($this->base_view.'index', compact('menu'));
	}


	public function add(){
		$parent = Menu::whereParentId(0)->get();
		return view($this->base_view.'popup.add', compact('parent'));
	}

	public function insert(createMenu $request){
		$data = [
			'parent_id'	=> $request->parent_id,
			'nama'		=> $request->nama,
			'link'		=> $request->link,
			'is_internal'	=> $request->is_internal
		];
		Menu::create($data);

		return 'ok';
	}



}
