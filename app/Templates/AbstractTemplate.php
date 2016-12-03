<?php namespace MyTailor\Templates;

use Illuminate\View\View;

abstract class AbstractTemplate {

    protected $view;

    abstract public function prepare(View $view, array $parameters);

    /**
     * Returns the view here
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }
}