<?php


namespace MyTailor\Modules\Shots\Events;


class ShotWasPosted
{
    private $shot;

    public function __construct($shot)
    {
        $this->shot = $shot;
    }
}