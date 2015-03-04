<?php namespace App\Http\ViewComposers\Frontend;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use \App\Models\Mst\KategoriWeblink;

class WeblinkComposer {


  
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

        $kategori_weblink = KategoriWeblink::with('mst_weblink')->get();

         $view->with('kategori_weblink', $kategori_weblink); 


    }

}