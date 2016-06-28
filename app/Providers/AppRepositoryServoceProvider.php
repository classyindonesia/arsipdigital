<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryServoceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->bind('Repo\Contracts\SetupVariableInterface',
            'Repo\Eloquent\SetupVariable');        

        $this->app->bind('Repo\Contracts\Mst\FilterDomainRepoInterface',
            'Repo\Eloquent\Mst\FilterDomainRepo');


        $this->app->bind('Repo\Contracts\Mst\AlbumGaleryRepoInterface',
            'Repo\Eloquent\Mst\AlbumGaleryRepo');

        $this->app->bind('Repo\Contracts\Mst\PasswordMediaRepoInterface',
            'Repo\Eloquent\Mst\PasswordMediaRepo');

        $this->app->bind('Repo\Contracts\Mst\AksesStaffRepoInterface',
            'Repo\Eloquent\Mst\AksesStaffRepo');

        $this->app->bind('Repo\Contracts\Mst\UserRegistrationRepoInterface',
            'Repo\Eloquent\Mst\UserRegistrationRepo');

        $this->app->bind('Repo\Contracts\Mst\UserRepoInterface',
            'Repo\Eloquent\Mst\UserRepo');

        $this->app->bind('Repo\Contracts\Mst\DataUserRepoInterface',
            'Repo\Eloquent\Mst\DataUserRepo');        

        $this->app->bind('Repo\Contracts\Mst\ArsipRepoInterface',
            'Repo\Eloquent\Mst\ArsipRepo');

        $this->app->bind('Repo\Contracts\Mst\BeritaRepoInterface',
            'Repo\Eloquent\Mst\BeritaRepo');        

    }
}
