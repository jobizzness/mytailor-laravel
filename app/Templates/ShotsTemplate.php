<?php


namespace MyTailor\Templates;
use Illuminate\Http\Request;
use Illuminate\View\View;
use MyTailor\Shot;
use Carbon\Carbon;
use MyTailor\Repositories\ShotsRepositoryInterface;
use SEOMeta;
use OpenGraph;
use Twitter;
class ShotsTemplate extends AbstractTemplate   {


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
    public function __construct(ShotsRepositoryInterface $shots, Request $request) {

        $this->shots = $shots;
        $this->request = $request;
    }

    public function prepare(View $view, array $parameters)
    {

        $sort = array_key_exists ( 'sort' , $parameters) ? $parameters['sort'] : 'trending';
        $cat = $this->request->get('cat') ? $this->request->get('cat') : null;

        $this->seoMake($cat);


            switch($sort){

                case 'featured':
                    $shots = $this->shots->featured($cat);
                    break;
                case 'latest':
                    $shots = $this->shots->latest($cat);
                    break;
                Default:
                    $shots = $this->shots->trending($cat);

        }

        $view->with('shots', $shots)->with('cat', $cat);
    }

    protected function seoMake($cat)
    {
        {
            switch($cat){
                case 'ma':
                    SEOMeta::setTitle('Men | MyTailor African Fashion Designers');
                    SEOMeta::setDescription('Women Prints · Check out latest trending African Dresses..');
                    OpenGraph::setDescription('Women Prints · Check out latest trending African Dresses...');
                    OpenGraph::setUrl('http://mytailorafrica.com/shots/?cat=ac');
                    OpenGraph::setTitle('Men | MyTailor African Fashion Designers');
                    Twitter::setTitle('Men | MyTailor African Fashion Designers');

                    break;
                case 'fm':
                    SEOMeta::setTitle('Women | MyTailor African Fashion Designers');
                    SEOMeta::setDescription('Men · Blazers, Shirts, Latest African Fashion Prints...');
                    OpenGraph::setDescription('Men · Blazers, Shirts, Latest African Fashion Prints...');
                    OpenGraph::setUrl('http://mytailorafrica.com/shots/?cat=ac');
                    OpenGraph::setTitle('Women | MyTailor African Fashion Designers');
                    Twitter::setTitle('Women | MyTailor African Fashion Designers');

                    break;
                case 'cu':
                    SEOMeta::setTitle('Couples | MyTailor African Fashion Designers');
                    SEOMeta::setDescription('Couples · Lastest African Prints for couples..');
                    OpenGraph::setDescription('Couples · Lastest African Prints for couples..');
                    OpenGraph::setUrl('http://mytailorafrica.com/shots/?cat=ac');
                    OpenGraph::setTitle('Couples | MyTailor African Fashion Designers');
                    Twitter::setTitle('Couples | MyTailor African Fashion Designers');
                    break;
                case 'ki':
                    SEOMeta::setTitle('Kids | MyTailor African Fashion Designers');
                    SEOMeta::setDescription('Kids · girls, boys, Latest African Fashion Prints...');
                    OpenGraph::setDescription('Kids · girls, boys, Latest African Fashion Prints...');
                    OpenGraph::setUrl('http://mytailorafrica.com/shots/?cat=ac');
                    OpenGraph::setTitle('Kids | MyTailor African Fashion Designers');
                    Twitter::setTitle('Kids | MyTailor African Fashion Designers');
                    break;
                case 'ac':
                    SEOMeta::setTitle('Accessories | MyTailor African Fashion Designers');
                    SEOMeta::setDescription('');
                    OpenGraph::setDescription('');
                    OpenGraph::setUrl('http://mytailor.me/shots/?cat=ac');
                    OpenGraph::setTitle('Accessories | MyTailor African Fashion Designers');
                    Twitter::setTitle('Accessories | MyTailor African Fashion Designers');
                    break;
                Default:
                    SEOMeta::setTitle('Shots | MyTailor African Fashion Designers');
                    SEOMeta::setDescription('See what\'s trending in African Fashion. From cultural, modern to classic office wears.');
                    OpenGraph::setDescription('See what\'s trending in African Fashion. From cultural, modern to classic office wears.');
                    OpenGraph::setUrl('http://mytailorafrica.com/shots');
                    OpenGraph::setTitle('Shots');
                    Twitter::setTitle('Shots');
            }
        }


        //SEOMeta::setCanonical('https://codecasts.com.br/lesson');

        OpenGraph::addProperty('type', 'business.clothing');
        Twitter::setTitle('Shots');
        Twitter::setSite('');
    }
}