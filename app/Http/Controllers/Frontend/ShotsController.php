<?php

namespace MyTailor\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Laracasts\Commander\CommandBus;
use Laracasts\Commander\Events\DispatchableTrait;
use MyTailor\Modules\Shots\ViewShotCommand;
use MyTailor\Repositories\ShotsRepositoryInterface;
use MyTailor\Http\Requests;
use MyTailor\Transformers\ShotTransformer;

class ShotsController extends ApiController
{
    use DispatchableTrait;

    /**
     * @var CommandBus
     */
    private $commandBus;
    /**
     * @var ShotTransformer
     */
    private $Transformer;

    /**
     * shotsController constructor.
     *
     * @param ShotsRepositoryInterface $shots
     * @param CommandBus $commandBus
     * @param ShotTransformer $Transformer
     */
    public function __construct(ShotsRepositoryInterface $shots, CommandBus $commandBus, ShotTransformer $Transformer)
    {

        $this->shots = $shots;
        $this->commandBus = $commandBus;
        $this->Transformer = $Transformer;
    }

    /**
     * @param $sort
     * @param Request $request
     * @return mixed
     */
    public function index($sort, Request $request)
    {

        $shots = $this->getShots($sort, $request);

        if(! $shots) {

            return Response::json([
                'error' => [
                    'message' => 'No results Found'
                ]
            ], 404);

        }

        return Response::json([

            'response' => [

                 'shots' => [
                    'data' => $this->Transformer->transformCollection($shots),
                    'nextPage' => $shots->nextPageUrl()
                    ]
            ]

        ], 200);



    }

    /**
     * Gets info about a shot and response in Json
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {

        $command = new ViewShotCommand($id);
        $shot = $this->commandBus->execute($command);

        if(! $shot) {

            return Response::json([
                'error' => [
                    'message' => 'Shot was not found'
                ]
            ], 404);

        }

        $this->dispatchEventsFor($shot);

        return Response::json([

           'response' => [
                    'data' => $this->Transformer->transform($shot)
           ]

        ], 200);

    }

    /**
     * Increment views for $this shot
     *
     * @param $id
     * @return string
     */
    public function viewed($id)
    {
        $shot = $this->shots->findByName($id);
        $this->shots->incrementViews($shot);

    }

    /**
     * @param $sort
     * @param Request $request
     * @return mixed
     */
    protected function getShots($sort, Request $request)
    {
        $cat = $request->get('cat') ?: null;

        switch ($sort) {
            case 'featured':
                $shots = $this->shots->featured($cat);
                break;
            case 'latest':
                $shots = $this->shots->latest($cat);
                break;
            Default:
                $shots = $this->shots->trending($cat);
                return $shots;
        }
        return $shots;
    }

}
