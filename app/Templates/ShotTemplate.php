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
        SEOMeta::setTitle('MyTailor | ' . substr($shot->title, 0, 30));
        SEOMeta::setDescription(substr($shot->description, 0, 60));
        SEOMeta::addMeta('product:published_time', $shot->date, 'property');
        SEOMeta::addMeta('product:section', $shot->category, 'property');
        SEOMeta::addKeyword($shot->tags->lists('tag_name'));

        OpenGraph::setDescription($shot->description);
        OpenGraph::setTitle($shot->title);
        OpenGraph::setUrl('http://mytailor.me/shot/' . pathinfo($shot->file_name, PATHINFO_FILENAME));
        OpenGraph::addProperty('type', 'product.item');
        //OpenGraph::addProperty('locale', 'pt-br');
        //OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
        //Carbon::parse($shot->updated_at)->subMinutes(2)->diffForHumans()
    }

}