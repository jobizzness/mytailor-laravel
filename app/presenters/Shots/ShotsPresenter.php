<?php namespace MyTailor\Presenters\Shots;

use Laracasts\Presenter\Presenter;

class ShotsPresenter extends Presenter
{
    public function title()
    {
        return strlen($this->description) > 150 ? substr($this->description,0,150)."..." : $this->description;
    }
}