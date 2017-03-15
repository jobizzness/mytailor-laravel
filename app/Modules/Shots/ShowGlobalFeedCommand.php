<?php


namespace MyTailor\Modules\Shots;



class ShowGlobalFeedCommand
{

    /**
     * @property  shots
     */
    public $shots;

    /**
     * ShowGlobalFeedCommand constructor.
     * @param $shots
     */
    public function __construct($shots)
    {

        $this->shots = $shots;

    }
}