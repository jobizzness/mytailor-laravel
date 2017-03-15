<?php

namespace MyTailor\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Laracasts\Commander\Events\DispatchableTrait;
use MyTailor\Modules\Shots\ShowGlobalFeedCommand;
use MyTailor\Modules\Shots\ViewShotCommand;
use MyTailor\Modules\Traits\CommandBus;
use MyTailor\Profile;
use MyTailor\Repositories\ShotsRepositoryInterface;
use MyTailor\Http\Requests;
use MyTailor\Transformers\ShotTransformer;

class ShotsController extends ApiController
{
    use DispatchableTrait, CommandBus;

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
     * @param ShotTransformer $Transformer
     */
    public function __construct(ShotsRepositoryInterface $shots, ShotTransformer $Transformer)
    {

        $this->shots = $shots;
        $this->Transformer = $Transformer;

        parent::__construct();
    }
    /**

     * @return mixed
     */

    public function index()
    {

        $shots = $this->shots->newest(200)->with('image','comments', 'publishable.profile')->get();
        $command = new ShowGlobalFeedCommand($shots);
        return $this->responder($this->execute($command));

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
        $shot = $this->execute($command);

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
