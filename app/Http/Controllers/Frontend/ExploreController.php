<?php

namespace MyTailor\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use MyTailor\Http\Requests;
use MyTailor\Modules\Exploration\ExploreThingsCommand;
use MyTailor\Modules\Traits\CommandBus;
use MyTailor\Transformers\ExploreTransformer;

class ExploreController extends ApiController
{
    use CommandBus;

    /**
     * @var
     */
    private $request;
    /**
     * @var ExploreTransformer
     */
    private $transformer;

    /**
     * ExploreController constructor.
     * @param Request $request
     * @param ExploreTransformer $transformer
     */
    public function __construct(Request $request, ExploreTransformer $transformer)
    {

        parent::__construct();
        $this->request = $request;
        $this->transformer = $transformer;
    }

    public function index()
    {

        $command = new ExploreThingsCommand();
        $things = $this->execute($command);


        //means we have shots so lets send them through.
        return $this->respond([
            'response' => [
                'data' => $this->transformer->transform($things)
            ]
        ]);
    }

    /**
     * Lets Explore A TAG
     *
     * @param $slug
     * @return mixed
     */
    public function show($slug)
    {

        $shots = $this->shots->explore($slug);


        if(! $shots) {
            //we have no shots sorry.
            return $this->NotFound('No results Found');
        }


    }

}
