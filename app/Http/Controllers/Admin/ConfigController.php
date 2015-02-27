<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Auth, Input;

/* models */
use App\Models\Mst\User;
use SetupVariable;

 
class ConfigController extends Controller {
 
 	public function __construct(){
 		view()->share('config_home', true);
 	}


 	public function index(){
 		$sv = new SetupVariable;
 		$view = 'konten.backend.config.index';
 		return view($view, compact('sv'));
 	}

 	public function update_value(){
 		$sv = SetupVariable::whereVariable(Input::get('variable_config'))->first();
 		$sv->value = Input::get('value_config');
 		$sv->save();
 		return 'ok';
 	}


 }