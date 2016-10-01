<?php


namespace MyTailor\Modules\Shots\Events;


class ShotWasViewed
{

    public $shot;

    public function __construct($shot)
    {
        $this->shot = $shot;
    }

}