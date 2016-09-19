<?php namespace MyTailor\Modules\Shots;


class PostShotCommand
{
    public $file_name;
    public $published_by;
    public $publishable_type;
    public $publishable_id;


    /**
     * PostShotCommand constructor.
     *
     * @param $file_name
     * @param $published_by
     * @param $publishable_type
     * @param $publishable_id
     */
    public function __construct($file_name, $publishable_type, $publishable_id, $published_by)
    {

        $this->file_name = $file_name;
        $this->published_by = $published_by;
        $this->publishable_type = $publishable_type;
        $this->publishable_id = $publishable_id;
    }
}