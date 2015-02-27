<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(){
        View::composer('layouts.komponen.public._navbar', 'App\Http\ViewComposers\Frontend\NavbarComposer@compose');
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        //
    }

}