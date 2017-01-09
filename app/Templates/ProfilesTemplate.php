<?php


namespace MyTailor\Templates;

use Illuminate\View\View;
use MyTailor\Repositories\UsersRepositoryInterface;
use SEOMeta;
use OpenGraph;
use Twitter;
class ProfilesTemplate extends AbstractTemplate{

    /**
     * @var string
     */
    protected $view = 'profile';
    /**
     * @var
     */
    private $users;

    /**
     * ProfilesTemplate constructor.
     * @param UsersRepositoryInterface $users
     */
    public function __construct(UsersRepositoryInterface $users)
    {

        $this->users = $users;
    }

    public function prepare(View $view, array $parameters)
    {
        $id = $parameters['username'];

        $profile = $this->users->getProfile($id);

        $this->seoMake($profile);


       $view->with('resource', 'shots')
            ->with('profile', $profile);
    }

    protected function seoMake($profile)
    {
        SEOMeta::setTitle($profile->display_name);
        SEOMeta::setDescription('See what'.$profile->display_name.'posted on Afrodapp');
        //SEOMeta::setCanonical('https://codecasts.com.br/lesson');

        OpenGraph::setDescription($profile->display_name.'on Afrodapp');
        OpenGraph::setTitle('Brands');
        OpenGraph::setUrl('/'.$profile->username);
        OpenGraph::addProperty('type', 'business.fashion');

//        Twitter::setTitle('Home');
//        Twitter::setSite('@LuizVinicius73');
    }
}