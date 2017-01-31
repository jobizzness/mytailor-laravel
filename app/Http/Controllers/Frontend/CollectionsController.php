<?php namespace MyTailor\Http\Controllers\Frontend;


use Illuminate\Http\Request;
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
     * @param Request $request
     * @return mixed
     * @internal param $slug
     */
    public function index(Request $request)
    {
        $slug = $request->get('sort');

        $collection = $this->collections->find($slug);

        if(! $collection) {
            //we have no shots sorry.
            return $this->NotFound('No results Found');
        }

        //means we have shots so lets send them through.
        return $this->respond([
            'response' => [
                'collection' => [
                  'title' => $collection->title,
                  'description' => $collection->description,
                  'slug' => $collection->slug,
                    'time' =>$collection->published_at,
                    'image'=> $collection->image
                ],
                'shots' => [
                    'data' => $this->Transformer->transformCollection($collection->shots),
                    'nextPage' => $collection->shots->nextPageUrl()
                ]
            ]
        ]);
    }

}