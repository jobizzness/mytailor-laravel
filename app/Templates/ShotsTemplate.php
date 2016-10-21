<?php namespace MyTailor\Templates;

use Illuminate\Http\Request;
use Illuminate\View\View;
use MyTailor\Shot;
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

        $cat = $this->request->get('cat') ? $this->request->get('cat') : null;

        $this->seoMake($cat);
        $view->with('res', 'shots');

    }

    protected function seoMake($cat)
    {
        {
            switch($cat){
                case 'fm':
                    SEOMeta::setTitle('Women | African Fashion Styles for women');
                    SEOMeta::setDescription('African Fashion Dresses ladies, Ankara styles, Nigerian, Ghanaian styles. Choose the best fit for yourself, Dresses, Blazers, Pants, Skirts, Swim Suits ........');
                    OpenGraph::setDescription('African Fashion Dresses ladies, Ankara styles, Nigerian, Ghanaian styles. Choose the best fit for yourself, Dresses, Blazers, Pants, Skirts, Swim Suits ........');
                    OpenGraph::setUrl('http://mytailorafrica.com/shots/?cat=ac');
                    OpenGraph::setTitle('Women | African Fashion Styles for women');
                    Twitter::setTitle('Women | African Fashion Styles for women');

                    break;
                case 'ma':
                    SEOMeta::setTitle('Men | African Fashion Styles for men');
                    SEOMeta::setDescription('African Fashion men, men\'s wear Ankara styles, Nigerian, Ghanaian styles. Blazers, Shirts, Outfits, bazin, homme, prints, and more.');
                    OpenGraph::setDescription('African Fashion men, men\'s wear Ankara styles, Nigerian, Ghanaian styles. Blazers, Shirts, Outfits, bazin, homme, prints, and more.');
                    OpenGraph::setUrl('http://mytailorafrica.com/shots/?cat=ac');
                    OpenGraph::setTitle('Men | African Fashion Styles for men');
                    Twitter::setTitle('Men | African Fashion Styles for men');

                    break;
                case 'cu':
                    SEOMeta::setTitle('Couples | African Fashion Styles for couples');
                    SEOMeta::setDescription('Latest couple wears on MyTailor Africa, Nigerian, Ghanaian styles. Blazers, Shirts, Outfits, bazin, homme, prints for weddings, occasions and more.');
                    OpenGraph::setDescription('Latest couple wears on MyTailor Africa, Nigerian, Ghanaian styles. Blazers, Shirts, Outfits, bazin, homme, prints for weddings, occasions and more.');
                    OpenGraph::setUrl('http://mytailorafrica.com/shots/?cat=ac');
                    OpenGraph::setTitle('Couples | African Fashion Styles for couples');
                    Twitter::setTitle('Couples | African Fashion Styles for couples');
                    break;
                case 'ki':
                    SEOMeta::setTitle('Kids | African Fashion Styles for kids');
                    SEOMeta::setDescription('Kids · girls, boys, Latest African Fashion Prints for kids. Kids ankara at MyTailor Africa. your kids will love these dresses.');
                    OpenGraph::setDescription('Kids · girls, boys, Latest African Fashion Prints for kids. Kids ankara at MyTailor Africa. your kids will love these dresses.');
                    OpenGraph::setUrl('http://mytailorafrica.com/shots/?cat=ac');
                    OpenGraph::setTitle('Kids | African Fashion Styles');
                    Twitter::setTitle('Kids | MyTailor African Fashion Designers');
                    break;
                case 'ac':
                    SEOMeta::setTitle('Accessories | African Fashion Styles');
                    SEOMeta::setDescription('Accessories · shoes, bangles, jewelry African Fashion Prints accessories. Find something that matches with your style.');
                    OpenGraph::setDescription('Accessories · shoes, bangles, jewelry African Fashion Prints accessories. Find something that matches with your style.');
                    OpenGraph::setUrl('http://mytailor.me/shots/?cat=ac');
                    OpenGraph::setTitle('Accessories | African Fashion Styles');
                    Twitter::setTitle('Accessories | African Fashion Styles');
                    break;
                Default:
                    SEOMeta::setTitle('MyTailor | Latest African fashion styles');
                    SEOMeta::setDescription('Looking for what to wear ?  Get inspired by top African fashion designers and their amazing styles. comment, like and get engaged.');
                    OpenGraph::setDescription('Looking for what to wear ?  Get inspired by top African fashion designers and their amazing styles. comment, like and get engaged.');
                    OpenGraph::setUrl('https://mytailorafrica.com/shots');
                    OpenGraph::setTitle('MyTailor | Latest African fashion styles');
                    Twitter::setTitle('MyTailor | Latest African fashion styles');
            }
        }


        SEOMeta::setCanonical('https://www.mytailorafrica.com/shots');
        OpenGraph::addProperty('type', 'business.clothing');
        Twitter::setTitle('Shots');
        Twitter::setSite('@MyTailor_Africa');
    }
}