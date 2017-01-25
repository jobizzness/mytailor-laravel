<?php

namespace MyTailor\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'MyTailor\Listeners\Users\UpdateLastLoginOnLogin',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }

    /**
     * Register MyTailor Event Listeners
     */
    public function register()
    {

        ///$this->app['events']->listen('MyTailor.Modules.Shots.Events.ShotWasPosted', 'MyTailor\Listeners\Shots\GenerateShotColors');
        $this->app['events']->listen('MyTailor.Modules.Shots.Events.ShotWasViewed', 'MyTailor\Listeners\Shots\IncrementDomViews');
    }
}
