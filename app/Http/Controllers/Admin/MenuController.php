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

	public function edit($id){
		$menu = Menu::findOrFail($id);
		$parent = Menu::whereParentId(0)->get();
		return view($this->base_view.'popup.edit', compact('menu', 'parent'));
	}


	public function update(createMenu $request){
		$m = Menu::findOrFail($request->id);
		$m->parent_id = $request->parent_id;
		$m->nama 		= $request->nama;
		$m->link 		= $request->link;
		$m->is_internal = $request->is_internal;
		$m->save();
		return 'ok';
	}

	public function del(Request $request){
		$m = Menu::findOrFail($request->id);

		//delete child menu
			if(count($m->mst_menu_child)>0){
				foreach($m->mst_menu_child as $list){
					$list->delete();
				}
			}

		$m->delete();
		return 'ok';
	}

	public function child($id){
		$menu = Menu::whereParentId($id)->with('mst_menu_child')->paginate(10);
		return view($this->base_view.'index', compact('menu'));		
	}



}
