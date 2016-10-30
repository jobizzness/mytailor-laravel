<?php namespace MyTailor\Templates;

use Illuminate\View\View;
use Laracasts\Commander\CommandBus;
use Laracasts\Commander\Events\DispatchableTrait;
use MyTailor\Modules\Shots\ViewShotCommand;
use MyTailor\Repositories\ShotsRepositoryInterface;
use SEOMeta;
use OpenGraph;
use Twitter;

class ShotTemplate extends AbstractTemplate{

    use DispatchableTrait;
    /**
     * @var string
     */
    protected $view = 'shot';
    /**
     * @var ShotsRepositoryInterface
     */
    private $shots;
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * ShotTemplate constructor.
     * @param ShotsRepositoryInterface $shots
     * @param CommandBus $commandBus
     */
    public function __construct(ShotsRepositoryInterface $shots, CommandBus $commandBus)
    {
        $this->shots = $shots;
        $this->commandBus = $commandBus;
    }

    /**
     * Here us where it all happens
     *
     * @param View $view
     * @param array $parameters
     * @return \Illuminate\Http\Response
     */
    public function prepare(View $view, array $parameters)
    {
        $id = array_key_exists ( 'id' , $parameters) ? $parameters['id'] : null;
        $command = new ViewShotCommand($id);
        $shot = $this->commandBus->execute($command);

        if($shot) {
            $this->dispatchEventsFor($shot);
            $this->seoMake($shot);
            $view->with('shot', $shot);
        }

        return response()->view('errors.frontend.shot404', [], 404);
    }

    /**
     * @param $shot
     */
    private function seoMake($shot)
    {
        $title = ucfirst($shot->title);
        $description = strtok($shot->description, ".").'.';
        $url = 'https://mytailorafrica.com/shot/'.$shot->file_name;

        //Basic Meta Tags
        SEOMeta::setTitle($title)
            ->setDescription($description)
            ->setCanonical($url)
            ->addMeta('product:published_time', $shot->date, 'property')
            ->addMeta('product:section', $shot->category, 'property')
            ->addKeyword($shot->tags->lists('tag_name'));

        //OpenGraph for facebook
        OpenGraph::setTitle($title)
            ->setDescription($description)
            ->setType('article')
            ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
            ->setArticle([
                'published_time' => 'datetime',
                'section' => 'category',
                'tag' => 'string / array'
            ])->setUrl($url);

        //Meta tags for twitter
        Twitter::addValue('card', 'summary')
            ->setType('article')
            ->addImage('https://s-media-cache-ak0.pinimg.com/200x150/b3/62/bd/b362bd94480261dbc6ee6be9a80ebac2.jpg')
            ->setTitle($title)
            ->setDescription($description)
            ->setUrl($url)
            ->setSite('@MyTailor_Africa');

    }

}