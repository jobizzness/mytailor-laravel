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

        $this->seoMake();


       $view->with('resource', 'shots')
            ->with('profile', $profile);
    }

    protected function seoMake()
    {
        SEOMeta::setTitle('Jobizzness Watumad');
        //SEOMeta::setDescription('This is my page description');
        //SEOMeta::setCanonical('https://codecasts.com.br/lesson');

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Brands');
        OpenGraph::setUrl('http://mytailor.me');
        OpenGraph::addProperty('type', 'business.fashion');

        Twitter::setTitle('Home');
        Twitter::setSite('@LuizVinicius73');
    }
}