<?php 

namespace App\Models\Mst;

use App\Models\Mst\Menu;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Menu extends Eloquent
{
	protected $table = 'mst_menu';
	protected $fillable = ['nama', 'is_internal', 'parent_id', 'link'];


	public function mst_menu_child()
	{
		return $this->hasMany(Menu::class, 'parent_id');
	}


	public function mst_menu_parent()
	{
		return $this->belongsTo(Menu::class, 'parent_id');
	}



}