<?php

namespace MyTailor\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Laracasts\Commander\CommandBus;
use Laracasts\Commander\Events\DispatchableTrait;
use MyTailor\Http\Controllers\Controller;
use MyTailor\Modules\Shots\ViewShotCommand;
use MyTailor\Repositories\ShotsRepositoryInterface;
use MyTailor\Shot;
use MyTailor\Profile;
use MyTailor\Http\Requests;
use Carbon\Carbon;
use SEOMeta;
use OpenGraph;
use Twitter;

class ShotsController extends Controller
{
    use DispatchableTrait;

    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * shotsController constructor.
     *
     * @param ShotsRepositoryInterface $shots
     * @param CommandBus $commandBus
     * @internal param ShotsRepositoryInterface $shot
     */
    public function __construct(ShotsRepositoryInterface $shots, CommandBus $commandBus){

        $this->shots = $shots;
        $this->commandBus = $commandBus;
    }

    /**
     * @param $sort
     * @param Request $request
     * @return mixed
     */
    public function index($sort, Request $request)
    {

        $cat = $request->get('cat') ?: null;

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

        return $shots;
    }

    /**
     * Gets info about a shot and response in Json
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function show($id, Request $request )
    {

        $command = new ViewShotCommand($id);
        $shot = $this->commandBus->execute($command);



        if($shot) {

            $this->dispatchEventsFor($shot);

            if ($request->ajax() || $request->wantsJson()) {

                return $shot->toArray();
            }


        }


    }

    /**
     * Increment views for $this shot
     *
     * @param $id
     * @return string
     */
    public function viewed($id)
    {
        $this->shots->incrementViews($id);

        
    }

}
