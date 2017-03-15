<?php

namespace MyTailor\Modules\Exploration;


use MyTailor\Collection;
use MyTailor\Designer;
use MyTailor\Shot;

class ExploreThingsCommand
{
    /**
     * Collection of shots
     * @var
     */
    public $shots;

    /**
     * collection of designers
     * @var
     */
    public $designers;

    /**
     * collection of collections
     * @var
     */
    public $collections;

    /**
     * ExploreThingsCommand constructor.
     */
    public function __construct()
    {
        $this->shots = Shot::orderBy('created_at', 'desc')->limit(100)->get();
        $this->designers = Designer::orderBy('created_at', 'desc')->limit(100)->get();
        $this->collections = Collection::orderBy('created_at', 'desc')->limit(100)->get();
    }
}