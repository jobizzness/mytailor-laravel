<?php


namespace MyTailor\Templates;

use SEOMeta;
use OpenGraph;
use Twitter;
use Illuminate\View\View;

class ContactTemplate  extends AbstractTemplate
{
    protected $view = 'contact';

    /**
     * @param View $view
     * @param array $parameters
     * @internal param $
     */


    public function prepare(View $view, array $parameters)
    {
        $this->seoMake();

    }

    /**
     *
     */
    private function seoMake()
    {
        $title = 'Contact Us | Afrodapp';
        $description = '';
        $url = 'https://www.afrodapp.com/contact';

        //Basic Meta Tags
        SEOMeta::setTitle($title)
            ->setDescription($description)
            ->setCanonical($url);

        //OpenGraph for facebook
        OpenGraph::setTitle($title)
            ->setDescription($description)
            ->setType('article');

        //Meta tags for twitter
        Twitter::addValue('card', 'summary')
            ->setType('article');

    }
}