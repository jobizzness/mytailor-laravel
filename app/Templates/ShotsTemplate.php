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

        $cat = $this->request->get('cat') ? $this->request->get('cat') : null;
        $path = $this->request->fullUrl();
        $this->seoMake($cat, $path);
        $view->with('resource', 'shots');

    }

    protected function seoMake($cat, $path)
    {

            switch($cat){
                case 'fm':

                    //Meta for google
                    SEOMeta::setTitle('Women - Dashiki, Anakara, kitenge styles')
                        ->setDescription('African Fashion Dresses ladies, Ankara styles, Nigerian, Ghanaian styles. Choose your best fit on MytailorAfrica— Discover more')
                        ->setCanonical('https://mytailorafrica.com/categories/women');

                    //OpenGraph for facebook
                    OpenGraph::setDescription('African Fashion Dresses ladies, Ankara styles, Nigerian, Ghanaian styles. Choose your best fit on MytailorAfrica— Discover more')
                        ->setType('article')
                        ->setTitle('Women - Dashiki, Anakara, kitenge styles')
                        ->addImage('')
                        ->setUrl('https://mytailorafrica.com/categories/women');

                    //Meta tags for twitter
                    Twitter::addValue('card', 'summary_large_image')
                        ->setType('article')
                        ->addImage('')
                        ->setTitle('Women - Dashiki, Anakara, kitenge styles')
                        ->setDescription('African Fashion Dresses ladies, Ankara styles, Nigerian, Ghanaian styles. Choose your best fit on MytailorAfrica— Discover more')
                        ->setUrl('https://mytailorafrica.com/categories/women');

                    break;
                case 'ma':

                    //Meta for google
                    SEOMeta::setTitle('Men - Dashiki, Anakara, kitenge styles')
                        ->setDescription('African clothing for men, Ankara styles, Nigerian, Ghanaian styles. Blazers, Shirts, Kente on MytailorAfrica— Discover more. ')
                        ->setCanonical('https://mytailorafrica.com/categories/men');

                    //OpenGraph for facebook
                    OpenGraph::setDescription('African clothing for men, Ankara styles, Nigerian, Ghanaian styles. Blazers, Shirts, Kente on MytailorAfrica— Discover more. ')
                        ->setType('article')
                        ->setTitle('Men - Dashiki, Anakara, kitenge styles')
                        ->addImage('')
                        ->setUrl('https://mytailorafrica.com/categories/men');

                    //Meta tags for twitter
                    Twitter::addValue('card', 'summary_large_image')
                        ->setType('article')
                        ->addImage('')
                        ->setTitle('Men - Dashiki, Anakara, kitenge styles')
                        ->setDescription('African clothing for men, Ankara styles, Nigerian, Ghanaian styles. Blazers, Shirts, Kente on MytailorAfrica— Discover more. ')
                        ->setUrl('https://mytailorafrica.com/categories/men');


                    break;
                case 'cu':

                    //Meta for google
                    SEOMeta::setTitle('Couples - Dashiki, Anakara, kitenge styles')
                        ->setDescription('African clothing for couples, wedding dresses south african styles. prom dresses on MytailorAfrica— Discover more. ')
                        ->setCanonical('https://mytailorafrica.com/categories/couples');

                    //OpenGraph for facebook
                    OpenGraph::setDescription('African clothing for couples, wedding dresses south african styles. prom dresses on MytailorAfrica— Discover more. ')
                        ->setType('article')
                        ->setTitle('Couples - Dashiki, Anakara, kitenge styles')
                        ->addImage('')
                        ->setUrl('https://mytailorafrica.com/categories/couples');

                    //Meta tags for twitter
                    Twitter::addValue('card', 'summary_large_image')
                        ->setType('article')
                        ->addImage('')
                        ->setTitle('Couples - Dashiki, Anakara, kitenge styles')
                        ->setDescription('African clothing for couples, wedding dresses south african styles. prom dresses on MytailorAfrica— Discover more. ')
                        ->setUrl('https://mytailorafrica.com/categories/couples');

                    break;
                case 'ki':

                    //Meta for google
                    SEOMeta::setTitle('Kids - Dashiki, Anakara, kitenge styles')
                        ->setDescription('African clothing for couples, wedding dresses south african styles. prom dresses on MytailorAfrica— Discover more. ')
                        ->setCanonical('https://mytailorafrica.com/categories/kids');

                    //OpenGraph for facebook
                    OpenGraph::setDescription('African clothing for couples, wedding dresses south african styles. prom dresses on MytailorAfrica— Discover more. ')
                        ->setType('article')
                        ->setTitle('Kids - Dashiki, Anakara, kitenge styles')
                        ->addImage('')
                        ->setUrl('https://mytailorafrica.com/categories/kids');

                    //Meta tags for twitter
                    Twitter::addValue('card', 'summary_large_image')
                        ->setType('article')
                        ->addImage('')
                        ->setTitle('Kids - Dashiki, Anakara, kitenge styles')
                        ->setDescription('African clothing for couples, wedding dresses south african styles. prom dresses on MytailorAfrica— Discover more. ')
                        ->setUrl('https://mytailorafrica.com/categories/kids');

                    break;
                case 'ac':

                    //Meta for google
                    SEOMeta::setTitle('Accessories - Shoes, bangles, jewelry')
                        ->setDescription('Shoes, bangles, jewelry African Fashion Prints accessories on MytailorAfrica— Discover more. ')
                        ->setCanonical('https://mytailorafrica.com/categories/accessories');

                    //OpenGraph for facebook
                    OpenGraph::setDescription('Shoes, bangles, jewelry African Fashion Prints accessories on MytailorAfrica— Discover more. ')
                        ->setType('article')
                        ->setTitle('Accessories - Shoes, bangles, jewelry')
                        ->addImage('')
                        ->setUrl('https://mytailorafrica.com/categories/accessories');

                    //Meta tags for twitter
                    Twitter::addValue('card', 'summary_large_image')
                        ->setType('article')
                        ->addImage('')
                        ->setTitle('Accessories - Shoes, bangles, jewelry')
                        ->setDescription('Shoes, bangles, jewelry African Fashion Prints accessories on MytailorAfrica— Discover more. ')
                        ->setUrl('https://mytailorafrica.com/categories/accessories');

                    break;
                Default:

                    //Meta for google
                    SEOMeta::setTitle('African Fashion Inspirations on MyTailorAfrica')
                        ->setDescription('Get inspired by top African fashion designers and their amazing styles. comment, like and get engaged.')
                        ->setCanonical($path);

                    //OpenGraph for facebook
                    OpenGraph::setDescription('Get inspired by top African fashion designers and their amazing styles. comment, like and get engaged.')
                        ->setType('article')
                        ->setTitle('African Fashion Inspirations on MyTailorAfrica')
                        ->addImage('https://s3.amazonaws.com/mytailor-v1/uploads/images/facebook_cover.jpg')
                        ->setUrl($path);

                    //Meta tags for twitter
                    Twitter::addValue('card', 'summary_large_image')
                        ->setType('article')
                        ->addImage('https://s3.amazonaws.com/mytailor-v1/uploads/images/facebook_cover.jpg')
                        ->setTitle('African Fashion Inspirations on MyTailorAfrica')
                        ->setDescription('Get inspired by top African fashion designers and their amazing styles. comment, like and get engaged.')
                        ->setUrl($path);

        }

        Twitter::setSite('@MyTailor_Africa');
    }
}