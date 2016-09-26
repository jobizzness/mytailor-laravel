<?php namespace MyTailor\Presenters\Users;

use Laracasts\Presenter\Presenter;

class UsersPresenter extends Presenter
{

    public function displayName()
    {
        return $this->first_name .' '. $this->last_name;
    }

    public function last_seen()
    {
       return $this->updated_at->diffForHumans();
    }
}