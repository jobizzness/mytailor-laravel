<?php


namespace MyTailor\Templates;

use Illuminate\View\View;
use SEOMeta;
use OpenGraph;
use Twitter;
class BlogTemplate extends AbstractTemplate{

    /**
     * @var string
     */
    protected $view = 'blog';
    /**
     * @var
     */
    private $users;

    /**
     * ProfilesTemplate constructor.
     * @param UsersRepositoryInterface $users
     */
    public function __construct()
    {


    }

    public function prepare(View $view, array $parameters)
    {

    }

    protected function seoMake()
    {

    }
}