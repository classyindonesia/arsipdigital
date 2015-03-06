<?php namespace App\Http\ViewComposers\Frontend;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;

use App\Models\Mst\FotoSlide;

class FotoSlideComposer {


  
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

        $foto = FotoSlide::with('ref_jabatan')->take(5)->orderByRaw("RAND()")->get();

         $view->with('foto', $foto);

    }

}