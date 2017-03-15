<?php namespace MyTailor\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use MyTailor\Repositories\CollectionRepositoryInterface;
use MyTailor\Transformers\CollectionTransformer;
use MyTailor\Transformers\ShotTransformer;

class CollectionsController extends ApiController
{
    /**
     * @var CollectionRepositoryInterface
     */
    private $collections;
    /**
     * @var CollectionTransformer
     */
    private $collectionTransformer;
    /**
     * @var ShotTransformer
     */
    private $shotTransformer;

    /**
     * CollectionsController constructor.
     *
     * @param CollectionRepositoryInterface $collections
     * @param ShotTransformer $shotTransformer
     * @param CollectionTransformer $collectionTransformer
     */
    public function __construct(CollectionRepositoryInterface $collections,  ShotTransformer $shotTransformer,
                                CollectionTransformer $collectionTransformer)
    {

        $this->collections = $collections;
        $this->collectionTransformer = $collectionTransformer;
        $this->shotTransformer = $shotTransformer;

        parent::__construct();


    }

    /**
     * Gets info about a shot and response in Json
     *
     * @param $slug
     * @return mixed
     */
    public function show($slug)
    {

        $collection = $this->collections->find($slug);

        if(! $collection) {
            //we have no shots sorry.
            return $this->NotFound('No results Found');
        }

        //means we have shots so lets send them through.
        return $this->respond([
            'response' => [
                'collection' => $this->collectionTransformer->transform($collection),
                'shots' => [
                    'data' => $this->ShotTransformer->transformCollection($collection->shots),
                    'nextPage' => $collection->shots->nextPageUrl()
                ]
            ]
        ]);
    }

}