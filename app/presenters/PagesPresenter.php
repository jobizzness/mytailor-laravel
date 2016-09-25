<?php
namespace MyTailor\Presenters;

use Laracasts\Presenter\Presenter;

class PagesPresenter extends Presenter {

    public function prettyUri(){

        return '/'. ltrim($this->uri, '/');
    }

}