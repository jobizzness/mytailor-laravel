<?php

namespace MyTailor\Providers;

use Illuminate\Support\ServiceProvider;
class MtServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind('MyTailor\Repositories\ShotsRepositoryInterface', 'MyTailor\Repositories\DbShotsRepository');
        $this->app->bind('MyTailor\Repositories\UsersRepositoryInterface', 'MyTailor\Repositories\DbUsersRepository');
        $this->app->bind('MyTailor\Repositories\DesignersRepositoryInterface', 'MyTailor\Repositories\DbDesignersRepository');
        $this->app->bind('MyTailor\Repositories\AnalyticsRepositoryInterface', 'MyTailor\Repositories\GaAnalyticsRepository');

        // Pusher From The IOC
        $this->app->bind('Pusher', function($app){
           $keys = $app['config']->get('services.pusher');

            return new \Pusher($keys['key'], $keys['secret'], $keys['app_id']);
        });

    }
}