<?php namespace MyTailor\Modules\Core\Instagram;

use MetzWeb\Instagram\Instagram as InstagramEngine;

class Instagram extends InstagramEngine
{

    public function explore($tag=null)
    {
        return $this->_makeCall('tags/nofilter/media/recent');
    }

}