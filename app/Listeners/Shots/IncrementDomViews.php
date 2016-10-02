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

        $name = pathinfo($event->shot->file_name, PATHINFO_FILENAME);
        $data = ['name'=>$name];

        $pusher->trigger(['shotsChannel'], 'shotWasViewed', $data);

    }
}