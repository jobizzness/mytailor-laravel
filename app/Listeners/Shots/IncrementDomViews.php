<?php namespace MyTailor\Listeners\Shots;

use Laracasts\Commander\Events\EventListener;
use MyTailor\Modules\Shots\Events\ShotWasViewed;

class IncrementDomViews extends EventListener
{

    public function whenShotWasViewed(ShotWasViewed $event)
    {

        \App::make('Pusher')->trigger('shotsChannel', 'shotWasViewed', ['name' => $event->shot->file_name]);

    }
}