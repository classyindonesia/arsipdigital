<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{

	public function index()
	{
		$berita = Berita::orderBy('id', 'DESC')->whereIsPublished(1)->take(8)->get();
		return view('konten.frontend.auth.login.index', compact('berita'));
	}

}
