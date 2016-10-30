<?php


namespace MyTailor\Templates;

use Illuminate\View\View;
use MyTailor\Profile;
use MyTailor\Shot;
use SEOMeta;
use OpenGraph;
use Twitter;
class ProfilesTemplate extends AbstractTemplate{

    /**
     * @var string
     */
    protected $view = 'profile';



    public function prepare(View $view, array $parameters)
    {
        $this->seoMake();

       $shot = Shot::find(94);
        $shot->comments();
        $shot->publishable->profile = Profile::find([$shot->publishable->profile_id])->first();

//        foreach($shot->comments as $comment) {
//
//            $comment->publishable->Profile = Profile::find([$comment->publishable->profile_id])->first();
//        }


//            ->where("featured",'=',1)
//            ->orderByRaw("RAND()")
//            ->limit(20)
//            ->get();
//
       $view->with('shot', $shot);
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