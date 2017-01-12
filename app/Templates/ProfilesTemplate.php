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
        $title = $profile->display_name .' on Afrodapp';
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($profile->bio);
        SEOMeta::setCanonical('/'.$profile->username);
        OpenGraph::setDescription($profile->bio);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl('/'.$profile->username);
        //OpenGraph::addProperty('type', 'business.fashion');

        Twitter::addValue('card', 'summary')
            ->setType('article')
            ->addImage($profile->avatar)
            ->setTitle($title)
            ->setDescription($profile->bio)
            ->setUrl('/'.$profile->username)
            ->setSite('@afrodapp');
    }
}