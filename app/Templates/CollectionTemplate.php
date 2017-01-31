<?php namespace MyTailor\Templates;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
        //$keyword = str_replace('-', ' ', $slug);
        $collection = Collection::whereSlug($slug)->first();

        if($collection) {

            $this->seoMake($collection);
            $view->with('collection', $collection)->with('resource', 'collections');
        }

        return response()->view('errors.frontend.shot404', [], 404);

    }

    /**
     * @param Collection $collection
     */
    protected function seoMake(Collection $collection)
    {
        $title = ucwords($collection->title);
        $description = ucwords(strtok($collection->description, ".").'.');
        $url = 'https://afrodapp.com/collections/'.$collection->slug;
        $image = $collection->image;

        //Basic Meta Tags
        SEOMeta::setTitle($title)
            ->setDescription($description)
            ->setCanonical($url)
            ->addMeta('product:published_time', '81/82/8', 'property')
            ->addMeta('product:section', 'wateca', 'property');
            //->addKeyword($shot->tags->lists('tag_name'));

        //OpenGraph for facebook
        OpenGraph::setTitle($title)
            ->setDescription($description)
            ->setType('article')
            ->addImage($image)
            ->setArticle([
                'published_time' => 'datetime',
                'section' => 'category',
                'tag' => 'string / array'
            ])->setUrl($url);

        //Meta tags for twitter
        Twitter::addValue('card', 'summary_large_image')
            ->setType('article')
            ->addImage($image)
            ->setTitle($title)
            ->setDescription($description)
            ->setUrl($url)
            ->setSite('@afrodapp');

    }


}