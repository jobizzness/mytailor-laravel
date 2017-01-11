<?php

namespace MyTailor\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Laracasts\Commander\CommandBus;
use Laracasts\Commander\Events\DispatchableTrait;
use MyTailor\Modules\Shots\ViewShotCommand;
use MyTailor\Profile;
use MyTailor\Repositories\ShotsRepositoryInterface;
use MyTailor\Http\Requests;
use MyTailor\Transformers\ShotTransformer;
use MyTailor\User;

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
     * @param Request $request
     * @return mixed
     */

    public function index(Request $request)
    {

        $shots = $this->getShots($request);

        return $this->responder($shots);

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

        if( $shot) {
            $this->dispatchEventsFor($shot);

            return $this->respond([
                'response' => [
                    'data' => $this->Transformer->transform($shot)
                ]
            ]);
        }
        return $this->NotFound('Shot was not Found');
    }

    public function create()
    {
        // GET => /shots/create
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        // GET => /shots/{id}/edit
    }

    /**
     * @param $id
     */
    public function update($id)
    {
        // PUT/PATCH => /shots/{id}
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        // DELETE => /questions/{id}
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
     * @param $name
     */
    public function toggleLike($name)
    {
        $shot = $this->shots->findByName($name);

        $shot->toggle();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function by($id)
    {

        $profile = Profile::where('username', $id)->first();
        $type = $profile->type;

        $user = $type::where('profile_id', $profile->id)->first();

        $shots = $user ? $this->shots->by($user): null;

        return $this->responder($shots);
    }
    /**
     * @param Request $request
     * @return mixed
     */
    protected function getShots(Request $request)
    {

        $cat = $request->get('cat') ?: null;
        $sort = $request->get('sort') ?: null;

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

    /**
     * @param $shots
     * @return mixed
     */
    protected function responder($shots)
    {
        if (!$shots) {
            //we have no shots sorry.
            return $this->NotFound('No results Found');
        }

        //means we have shots so lets send them through.
        return $this->respond([
            'response' => [
                'shots' => [
                    'data' => $this->Transformer->transformCollection($shots),
                    'nextPage' => $shots->nextPageUrl()
                ]
            ]
        ]);
    }

}
