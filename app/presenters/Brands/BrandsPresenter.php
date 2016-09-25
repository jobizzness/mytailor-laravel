<?php namespace MyTailor\Presenters\Brands;

use Laracasts\Presenter\Presenter;

class BrandsPresenter extends Presenter
{
    /**
     * @return mixed
     */
    public function displayName()
    {
        return $this->name;
    }
}