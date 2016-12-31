<?php


namespace MyTailor\Templates;

use Illuminate\View\View;
use MyTailor\Modules\Core\Instagram\Instagram;
use SEOMeta;
use OpenGraph;
use Twitter;

class ExploreTemplate  extends AbstractTemplate
{
    protected $view = 'explore';

    /**
     * @param View $view
     * @param array $parameters
     * @internal param $
     */


    public function prepare(View $view, array $parameters)
    {

        $this->seoMake();
    }

    private function seoMake()
    {
        $title = 'Explore | African Fashion Trends on Afrodapp';
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