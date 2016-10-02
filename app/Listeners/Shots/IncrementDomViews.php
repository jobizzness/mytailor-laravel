<?php namespace MyTailor\Listeners\Shots;

use Laracasts\Commander\Events\EventListener;
use MyTailor\Modules\Shots\Events\ShotWasViewed;
use MyTailor\Providers\LaravelLoggerProxy;

class IncrementDomViews extends EventListener
{

    public function whenShotWasViewed(ShotWasViewed $event)
    {

       $pusher = \App::make('Pusher');
            $pusher->set_logger( new LaravelLoggerProxy() );
        $pusher->trigger('shotsChannel', 'shotWasViewed', ['name' => $event->shot->file_name]);

    }
}