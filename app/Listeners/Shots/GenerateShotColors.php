<?php namespace MyTailor\Listeners\Shots;

use Laracasts\Commander\Events\EventListener;
use MyTailor\Modules\Shots\Events\ShotWasPosted;

class GenerateShotColors extends EventListener
{

    public function whenShotWasPosted(ShotWasPosted $event)
    {
       //
    }
}