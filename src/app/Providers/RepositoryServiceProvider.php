<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {        
        $this->app->bind(
            'App\Interfaces\CountyInterface',
            'App\Repositories\CountyRepository'
        );
        
        $this->app->bind(
            'App\Interfaces\CityInterface',
            'App\Repositories\CityRepository'
        );
    }
}