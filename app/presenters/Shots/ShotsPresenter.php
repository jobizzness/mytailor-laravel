<?php namespace MyTailor\Presenters\Shots;

use Laracasts\Presenter\Presenter;

class ShotsPresenter extends Presenter
{
    public function title()
    {
        return strlen($this->description) > 60 ? substr($this->description,0,60)."..." : $this->description;
    }
}