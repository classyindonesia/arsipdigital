<?php namespace App\Http\ViewComposers\Frontend;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;

use App\Models\Mst\LampiranBerita;

class LampiranBeritaComposer {


  
    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct() {
     }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view){
        $lampiran_berita =  LampiranBerita::orderBy('id', 'DESC')->take(5)->get();
        $hashids = new \Hashids\Hashids('qertymyr');

        $view->with('lampiran_berita', $lampiran_berita);
        $view->with('hashids', $hashids);

    }

}