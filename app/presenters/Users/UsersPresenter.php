<?php namespace MyTailor\Presenters\Users;

use Laracasts\Presenter\Presenter;

class UsersPresenter extends Presenter
{

    public function fullName()
    {
        return $this->first_name .' '. $this->last_name;
    }

    public function last_seen()
    {
        if($this->last_login_at) {
            return $this->last_login_at->diffForHumans();
        }
       return 'never';
    }

    public function role()
    {
        $role = $this->roles->first();
        if($role){
            return $role->name;
        }

        return 'BUGGY';

    }
}