<?php namespace MyTailor\Templates;

use Illuminate\Http\Request;
use Illuminate\View\View;
use MyTailor\Collection;
use SEOMeta;
use OpenGraph;
use Twitter;

class CollectionTemplate extends AbstractTemplate
{


    protected $view = 'collection';

    /**
     * HTTP request for retrieving user input
     *
     * @var Request
     */
    private $request;

    /**
     *
     * @param Request $request
     * @internal param ShotsRepositoryInterface|Shot $shots
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function prepare(View $view, array $parameters)
    {
        $slug = $parameters['slug'];
        $keyword = str_replace('-', ' ', $slug);
        $collection = Collection::whereSlug($keyword)->first();
        $this->seoMake($collection);
        $view->with('resource', 'collections')->with('collection', $collection);
    }

    /**
     * @param Collection $collection
     */
    protected function seoMake(Collection $collection)
    {
        $title = ucfirst($collection->slug);
        $description = strtok($collection->description, ".").'.';
        $url = 'https://mytailorafrica.com/collections/'.$collection->slug;

        //Basic Meta Tags
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical($url);

        //OpenGraph for facebook
        OpenGraph::setTitle($title)
            ->setDescription($description)
            ->setType('article')
            //->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
            ->setArticle([
                'published_time' => 'datetime',
                'section' => 'category',
                'tag' => 'string / array'
            ])->setUrl($url);

        //Meta tags for twitter
        Twitter::addValue('card', 'summary_large_image')
            ->setType('article')
            //->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
            ->setTitle($title)
            ->setDescription($description)
            ->setUrl($url)
            ->setSite('@MyTailor_Africa');

    }


}