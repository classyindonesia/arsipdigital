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
        $this->app->bind('Repo\Contracts\Mst\UserRepoInterface',
            'Repo\Eloquent\Mst\UserRepo');

        $this->app->bind('Repo\Contracts\Mst\ArsipRepoInterface',
            'Repo\Eloquent\Mst\ArsipRepo');

    }
}
