<?php namespace MyTailor\Templates;

use Illuminate\Http\Request;
use Illuminate\View\View;
use MyTailor\Shot;
use MyTailor\Repositories\ShotsRepositoryInterface;
use SEOMeta;
use OpenGraph;
use Twitter;

class CollectionTemplate extends AbstractTemplate
{


    protected $view = 'collection';
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

        $this->request = $request;
    }

    public function prepare(View $view, array $parameters)
    {



        $this->seoMake();

        $view->with('res', 'shots');

    }

    protected function seoMake()
    {



        {

            SEOMeta::setTitle('Hottest African Fashion Outfits & Attires');
            SEOMeta::setDescription('find the hottest African outfits south-africa traditional wears, dashiki shirts & more on MytailorAfrica— Discover more.');
            OpenGraph::setDescription('find the hottest African outfits south-africa traditional wears, dashiki shirts & more on MytailorAfrica— Discover more.');
            OpenGraph::setUrl('https://www.mytailorafrica.com/collections/hottest-african-fashion-styles-dresses');
            OpenGraph::setTitle('Hottest African Fashion Outfits & Attires');
            Twitter::setTitle('Hottest African Fashion Outfits & Attires');
        }


        SEOMeta::setCanonical('https://mytailorafrica.com/collections/hottest-african-fashion-styles-dresses');
        OpenGraph::addProperty('type', 'business.clothing');
        Twitter::setTitle('Hottest African Fashion Outfits & Attires');
        Twitter::setSite('@MyTailor_Africa');
    }


}