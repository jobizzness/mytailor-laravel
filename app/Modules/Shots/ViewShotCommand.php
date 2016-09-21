<?php


namespace MyTailor\Modules\Shots;


class ViewShotCommand
{
    public $name;

    public function __construct($name)
    {

        $this->name = $name;
    }
}