<?php namespace App\Http\ViewComposers\Frontend;

use App\Models\SetupVariable;
use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;

class LoginComposer {


  
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
        $view->with('sv', new SetupVariable); 
    }

}