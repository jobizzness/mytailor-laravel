<?php namespace MyTailor\Templates;

use Illuminate\Http\Request;
use Illuminate\View\View;
use SEOMeta;
use OpenGraph;
use Twitter;
class CategoryTemplate extends AbstractTemplate   {


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

        $cat = $this->request->segment(2);

        $this->seoMake($cat);
        $view->with('resource', 'explore');

    }

    protected function seoMake($cat)
    {

        // African dresses - Dashiki shirts, Anakara, modern dresses for women
        switch($cat){
            case 'women':

                //Meta for google
                SEOMeta::setTitle('Women - Afrodapp')
                    ->setDescription('Elegant African Dresses For Ladies, Latest Ankara Styles Prints for women. Casual, Office Wears, Prom Wedding Dresses on Afrodapp. — Discover More.
                        ')
                    ->setCanonical('https://www.afrodapp.com/categories/women');

                //OpenGraph for facebook
                OpenGraph::setDescription('Elegant African Dresses For Ladies, Latest Ankara Styles Prints for women. Casual, Office Wears, Prom Wedding Dresses on Afrodapp. — Discover More.
                    ')
                    ->setType('article')
                    ->setTitle('Beautiful African Women Dresses From Top African Designers')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setUrl('https://www.afrodapp.com/categories/women');

                //Meta tags for twitter
                Twitter::addValue('card', 'summary_large_image')
                    ->setType('article')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setTitle('Beautiful African Women Dresses From Top African Designers')
                    ->setDescription('Elegant African Dresses For Ladies, Latest Ankara Styles Prints for women. Casual, Office Wears, Prom Wedding Dresses on Afrodapp. — Discover More.
                        ')
                    ->setUrl('https://www.afrodapp.com/categories/women');

                break;
            case 'men':

                //Meta for google
                SEOMeta::setTitle('Men - Afrodapp')
                    ->setDescription('African Clothing For Men, Ankara Styles, Nigerian, Ghanaian Styles. Blazers, Shirts, Kente On Afrodapp — Discover more. 
                        ')
                    ->setCanonical('https://www.afrodapp.com/categories/men');

                //OpenGraph for facebook
                OpenGraph::setDescription('African Clothing For Men, Ankara Styles, Nigerian, Ghanaian Styles. Blazers, Shirts, Kente On Afrodapp — Discover more.
                    ')
                    ->setType('article')
                    ->setTitle('Top African Men Clothing You Need To See')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setUrl('https://www.afrodapp.com/categories/men');

                //Meta tags for twitter
                Twitter::addValue('card', 'summary_large_image')
                    ->setType('article')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setTitle('Top African Men Clothing You Need To See')
                    ->setDescription('
                        African Clothing For Men, Ankara Styles, Nigerian, Ghanaian Styles. Blazers, Shirts, Kente On Afrodapp — Discover more.')
                    ->setUrl('https://www.afrodapp.com/categories/men');


                break;
            case 'couples':

                //Meta for google
                SEOMeta::setTitle('Couple - Afrodapp')
                    ->setDescription('Couple Wears African Wedding Dresses South African Styles. Prom Dresses On Afrodapp — Discover more. ')
                    ->setCanonical('https://www.afrodapp.com/categories/couples');

                //OpenGraph for facebook
                OpenGraph::setDescription('Couple Wears African Wedding Dresses South African Styles. Prom Dresses On Afrodapp — Discover more. ')
                    ->setType('article')
                    ->setTitle('Couples - Dashiki, Anakara, kitenge styles')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setUrl('https://www.afrodapp.com/categories/couples');

                //Meta tags for twitter
                Twitter::addValue('card', 'summary_large_image')
                    ->setType('article')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setTitle('Couples - Dashiki, Anakara, kitenge styles')
                    ->setDescription('Couple Wears African Wedding Dresses South African Styles. Prom Dresses On Afrodapp — Discover more. ')
                    ->setUrl('https://www.afrodapp.com/categories/couples');

                break;
            case 'kids':

                //Meta for google
                SEOMeta::setTitle('Kids - Afrodapp')
                    ->setDescription('Ankara Clothes For Kids On Afrodapp. Top Styles From The Best African Designers,
                        African Prints.
                        ')
                    ->setCanonical('https://www.afrodapp.com/categories/kids');

                //OpenGraph for facebook
                OpenGraph::setDescription('Ankara Clothes For Kids On Afrodapp. Top Styles From The Best African Designers,African Prints.
                    ')
                    ->setType('article')
                    ->setTitle('Kids - Dashiki, Anakara, kitenge styles')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setUrl('https://www.afrodapp.com/categories/kids');

                //Meta tags for twitter
                Twitter::addValue('card', 'summary_large_image')
                    ->setType('article')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setTitle('Kids - Dashiki, Anakara, kitenge styles')
                    ->setDescription('African clothing for couples, wedding dresses south african styles. prom dresses on MytailorAfrica— Discover more. ')
                    ->setUrl('https://www.afrodapp.com/categories/kids');

                break;
            Default:

                //Meta for google
                SEOMeta::setTitle('Accessories - Afrodapp')
                    ->setDescription('Shoes, bangles, jewelry African Fashion Prints accessories on Afrodapp Discover more. ')
                    ->setCanonical('https://www.afrodapp.com/categories/accessories');

                //OpenGraph for facebook
                OpenGraph::setDescription('Shoes, bangles, jewelry African Fashion Prints accessories on Afrodapp — Discover more. ')
                    ->setType('article')
                    ->setTitle('Accessories - Shoes, bangles, jewelry')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setUrl('https://www.afrodapp.com/categories/accessories');

                //Meta tags for twitter
                Twitter::addValue('card', 'summary_large_image')
                    ->setType('article')
                    ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
                    ->setTitle('Accessories - Shoes, bangles, jewelry')
                    ->setDescription('Shoes, bangles, jewelry African Fashion Prints accessories on Afrodapp — Discover more. ')
                    ->setUrl('https://www.afrodapp.com/categories/accessories');




        }

        Twitter::setSite('@MyTailor_Africa');
    }
}