<?php namespace MyTailor\Http\Controllers\Frontend;


use MyTailor\Repositories\CollectionRepositoryInterface;
use MyTailor\Transformers\ShotTransformer;

class CollectionsController extends ApiController
{
    /**
     * @var CollectionRepositoryInterface
     */
    private $collections;
    /**
     * @var ShotTransformer
     */
    private $Transformer;

    /**
     * CollectionsController constructor.
     *
     * @param CollectionRepositoryInterface $collections
     * @param ShotTransformer $Transformer
     */
    public function __construct(CollectionRepositoryInterface $collections,  ShotTransformer $Transformer)
    {

        $this->collections = $collections;
        $this->Transformer = $Transformer;
    }

    /**
     * Gets info about a shot and response in Json
     *
     * @param $slug
     * @return mixed
     */
    public function show($slug)
    {

        $slug = str_replace('-', ' ', $slug);

        $collection = $this->collections->find($slug);

        if(! $collection) {
            //we have no shots sorry.
            return $this->NotFound('No results Found');
        }

        //means we have shots so lets send them through.
        return $this->respond([
            'response' => [
                'shots' => [
                    'data' => $this->Transformer->transformCollection($collection->shots),
                    'nextPage' => $collection->shots->nextPageUrl()
                ]
            ]
        ]);
    }

}