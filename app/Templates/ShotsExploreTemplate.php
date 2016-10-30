<?php namespace MyTailor\Templates;

use Illuminate\Http\Request;
use Illuminate\View\View;
use MyTailor\Shot;
use MyTailor\Repositories\ShotsRepositoryInterface;
use SEOMeta;
use OpenGraph;
use Twitter;

class ShotsExploreTemplate extends AbstractTemplate
{


    protected $view = 'shots';
    /**
     * @var
     */
    private $shots;

    /**
     * HTTP request for retrieving user input
     *
     * @var Request
     */
    private $request;

    /**
     * HomeTemplate constructor.
     * @param ShotsRepositoryInterface|Shot $shots
     * @param Request $request
     */
    public function __construct(ShotsRepositoryInterface $shots, Request $request)
    {

        $this->shots = $shots;
        $this->request = $request;
    }

    public function prepare(View $view, array $parameters)
    {


        $slug = $parameters['slug'];
        $this->seoMake($slug);

        $view->with('resource', 'explore');

    }

    protected function seoMake($slug)
    {
        $slugURL = str_replace('-', ' ', $slug);


        {

                SEOMeta::setTitle('Latest '.$slugURL.' on MyTailor Africa');
                SEOMeta::setDescription('Find Latest '. $slugURL .' on MyTailor Africa. From cultural, modern to classic office wears Ankara Weddings and more.');
                OpenGraph::setDescription('Find Latest '. $slugURL .' on MyTailor Africa. From cultural, modern to classic office wears Ankara Weddings and more.');
                OpenGraph::setUrl('http://mytailorafrica.com/explore/' . $slugURL);
                OpenGraph::setTitle($slug);
                Twitter::setTitle($slug);
        }


        SEOMeta::setCanonical('http://mytailorafrica.com/explore/' . $slug);
        OpenGraph::addProperty('type', 'business.clothing');
        Twitter::setTitle(ucwords($slug));
        Twitter::setSite('@MyTailor_Africa');
    }


}