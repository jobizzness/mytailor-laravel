<?php


namespace MyTailor\Templates;

use Illuminate\View\View;
use MyTailor\Profile;
use MyTailor\Shot;
use SEOMeta;
use OpenGraph;
use Twitter;
class ProfilesTemplate extends AbstractTemplate{

    /**
     * @var string
     */
    protected $view = 'profile';



    public function prepare(View $view, array $parameters)
    {
        $this->seoMake();


       $view->with('resource', 'shots');
    }

    protected function seoMake()
    {
        SEOMeta::setTitle('Jobizzness Watumad');
        //SEOMeta::setDescription('This is my page description');
        //SEOMeta::setCanonical('https://codecasts.com.br/lesson');

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Brands');
        OpenGraph::setUrl('http://mytailor.me');
        OpenGraph::addProperty('type', 'business.fashion');

        Twitter::setTitle('Home');
        Twitter::setSite('@LuizVinicius73');
    }
}