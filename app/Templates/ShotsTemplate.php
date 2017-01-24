<?php namespace MyTailor\Templates;

use Illuminate\Http\Request;
use Illuminate\View\View;
use SEOMeta;
use OpenGraph;
use Twitter;
class ShotsTemplate extends AbstractTemplate   {


    protected $view = 'shots';

    /**
     * HTTP request for retrieving user input
     *
     * @var Request
     */
    private $request;

    /**
     * HomeTemplate constructor.
     * @param Request $request
     */
    public function __construct(Request $request) {

        $this->request = $request;
    }

    public function prepare(View $view, array $parameters)
    {
        $this->seoMake();
        $view->with('resource', 'shots');

    }

    protected function seoMake()
    {
                //Meta for google
                SEOMeta::setTitle('Afrodapp – Discover African Fashion Styles & Dresses')
                    ->setDescription('Get Inspired By Top African Fashion Designers And Their Amazing Styles, Dresses, Ankara, Prints, Kitenge & More . Comment, Like & Get Engaged.')
                    ->setCanonical('https://www.afrodapp.com');

                //OpenGraph for facebook
                OpenGraph::setDescription('Get Inspired By Top African Fashion Designers And Their Amazing Styles, Dresses, Ankara, Prints, Kitenge & More . Comment, Like & Get Engaged.')
                    ->setType('article')
                    ->setTitle('Afrodapp – Discover African Fashion Styles & Dresses')
                    ->addImage('https://static1.squarespace.com/static/5346bdbae4b0b4931a2ab884/t/57fa865ae58c6208093d3e29/1476036188467/tash+and+cody.jpeg')
                    ->setUrl('https://www.afrodapp.com');

                //Meta tags for twitter
                Twitter::addValue('card', 'summary_large_image')
                    ->setType('article')
                    ->addImage('https://static1.squarespace.com/static/5346bdbae4b0b4931a2ab884/t/57fa865ae58c6208093d3e29/1476036188467/tash+and+cody.jpeg')
                    ->setTitle('Afrodapp – Discover African Fashion Styles & Dresses')
                    ->setDescription('Get Inspired By Top African Fashion Designers And Their Amazing Styles, Dresses, Ankara, Prints, Kitenge & More . Comment, Like & Get Engaged.')
                    ->setUrl('https://www.afrodapp.com');
                Twitter::setSite('@afrodapp');
    }
}