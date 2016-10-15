<?php namespace MyTailor\Modules\Shots;


class PostShotCommand
{
    public $published_by;
    public $publishable_type;
    public $publishable_id;
    public $image;


    /**
     * PostShotCommand constructor.
     *
     * @param $published_by
     * @param $publishable_type
     * @param $publishable_id
     */
    public function __construct($publishable_type, $publishable_id, $published_by, $image)
    {

        $this->published_by = $published_by;
        $this->publishable_type = $publishable_type;
        $this->publishable_id = $publishable_id;
        $this->image = $image;
    }
}