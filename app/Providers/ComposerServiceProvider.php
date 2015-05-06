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
        View::composer('konten.frontend.auth.login.list_file', 'App\Http\ViewComposers\Frontend\LampiranBeritaComposer@compose');
        View::composer('konten.frontend.auth.login.statistik', 'App\Http\ViewComposers\Frontend\StatistikComposer@compose');
        View::composer('layouts.komponen.public.footer', 'App\Http\ViewComposers\Frontend\WeblinkComposer@compose');
        View::composer('konten.frontend.auth.login.form_login', 'App\Http\ViewComposers\Frontend\LoginComposer@compose');
        View::composer('konten.frontend.auth.login.foto_slide', 'App\Http\ViewComposers\Frontend\FotoSlideComposer@compose');
        View::composer('layouts.komponen.public._navbar_menu_tambahan', 'App\Http\ViewComposers\Frontend\NavbarMenuTambahanComposer@compose');

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