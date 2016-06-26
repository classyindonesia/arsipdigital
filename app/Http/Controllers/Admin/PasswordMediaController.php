<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\PasswordMediaRepoInterface;

class PasswordMediaController extends Controller
{
    private $base_view = 'konten.backend.password_media.';
    protected $password_media;

    public function __construct(PasswordMediaRepoInterface $password_media)
    {
    	view()->share('base_view', $this->base_view);
    	view()->share('backend_password_home', true);
    	$this->password_media = $password_media;
    }


    public function index()
    {
    	$password = $this->password_media->all(10);
    	return view($this->base_view.'index', compact('password'));
    }

    public function add()
    {
    	return view($this->base_view.'popup.add');
    }

    public function insert(Request $request)
    {
    	$this->validate($request, [
    		'nama'	=> 'required',
    		'password'	=> 'required|confirmed'
    	]);
    	return $this->password_media->create($request->except('_token'));
    }


    public function edit($id)
    {
    	$password = $this->password_media->find($id);
    	return view($this->base_view.'popup.edit', compact('password'));
    }

    public function update(Request $request)
    {
    	$check = $this->password_media->find($request->id);
    	$this->validate($request, [
    		'password_lama'	=> 'required',
    		'nama'	=> 'required',
    		'password'	=> 'required|confirmed'
    	]);

    	if($check->password != $request->password_lama){
    		return response(['error' => 'password lama tidak cocok'], 422);
    	}

    	$data = $request->except(['password_lama', '_token', 'id', 'password_confirmation']);
    	return $this->password_media->update($request->id, $data);
    }

    public function delete(Request $request)
    {
    	$this->password_media->delete($request->id);
    	return 'ok';
    }



}
