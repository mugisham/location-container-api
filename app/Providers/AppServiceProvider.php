<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Container\ContainerImpl;
use App\Repo\Container\EloquentContainer;
use App\Container;

use App\Repo\Location\EloquentLocation;
use App\Location;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $app=$this->app;

        $app->bind('App\Repo\Container\ContainerInterface', function($app)
        {
                return new EloquentContainer(
                    new Container
                    );
        });

        $app->bind('App\Repo\Location\LocationInterface', function($app)
        {
                return new EloquentLocation(
                    new Location
                    );
        });
    }
}
