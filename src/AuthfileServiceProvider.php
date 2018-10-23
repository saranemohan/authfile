<?php

namespace Semdevops\Authfile;

use Illuminate\Support\ServiceProvider;

class AuthfileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->make('Semdevops\Authfile\Controllers\AuthfileController');
        $this->loadRoutesFrom(__DIR__. '/routes/route.php');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
