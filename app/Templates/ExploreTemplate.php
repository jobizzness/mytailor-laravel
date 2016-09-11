<?php namespace MyTailor\Templates;

use Illuminate\Http\Request;
use Illuminate\View\View;
use MyTailor\Shot;
use MyTailor\Repositories\ShotsRepositoryInterface;
use SEOMeta;
use OpenGraph;
use Twitter;

class ExploreTemplate extends AbstractTemplate
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
        $slug = str_replace('-', ' ', $slug);

        //Category from the request
        $cat = $this->request->get('cat') ? $this->request->get('cat') : null;

        // Seo maker
        $this->seoMake($slug);
        $cat = $this->getCat($cat);

        $shots = $this->shots->explore($slug, $cat);

        $view->with('shots', $shots)->with('cat', $cat);
    }

    protected function seoMake($slug)
    {
        {

                SEOMeta::setTitle(ucwords($slug). ' | MyTailor Africa');
                SEOMeta::setDescription('Find Amazing '. ucwords($slug) .' on MyTailorAfrica. From cultural, modern to classic office wears Ankara Weedings and more.');
                OpenGraph::setDescription('Find Amazing '. ucwords($slug) .' on MyTailorAfrica. From cultural, modern to classic office wears Ankara Weedings and more.');
                OpenGraph::setUrl('http://mytailorafrica.com/explore/' . $slug);
                OpenGraph::setTitle(ucwords($slug). ' | MyTailor Africa');
                Twitter::setTitle(ucwords($slug). ' | MyTailor Africa');
        }


        SEOMeta::setCanonical('http://mytailorafrica.com/explore/' . $slug);
        OpenGraph::addProperty('type', 'business.clothing');
        Twitter::setTitle(ucwords($slug));
        Twitter::setSite('@MyTailor_Africa');
    }

    private function getCat($cat)
    {
        switch($cat){

            case 'ma':
                return 'men';

            case 'fm':
                return 'women';

            case 'cu':
                return 'couples';

            case 'ki':
                return 'kids';

            Default:
                return null;

        }
    }
}