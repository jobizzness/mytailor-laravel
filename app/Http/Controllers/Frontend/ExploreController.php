<?php

namespace MyTailor\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use MyTailor\Http\Requests;
use MyTailor\Repositories\DbShotsRepository;
use MyTailor\Http\Controllers\Controller;
use MyTailor\Transformers\ShotTransformer;

class ExploreController extends ApiController
{

    /**
     * @var DbShotsRepository
     */
    private $shots;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var ShotTransformer
     */
    private $Transformer;

    /**
     * ExploreController constructor.
     *
     * @param DbShotsRepository $shots
     * @param Request $request
     * @param ShotTransformer $Transformer
     */
    public function __construct(DbShotsRepository $shots, Request $request, ShotTransformer $Transformer)
    {

        $this->shots = $shots;
        $this->request = $request;
        $this->Transformer = $Transformer;
    }

    public function index(Request $request)
    {
        $tags = ['men', 'traditional', 'sexy', 'runway'];

        $shots = [];
        foreach($tags as $tag){
            $data = $this->shots->trendingShotsIn($tag)->paginate(6);
            //means we have shots so lets send them through.
            $item = [
                'response' => [
                    'name' =>$tag,
                    'shots' => [
                        'data' => $this->Transformer->transformCollection($data)
                    ]
                ]
            ];

            array_push($shots, $item);
        }

        return $shots;
    }

    /**
     * Lets Explore Shots
     *
     * @param $slug
     * @return mixed
     */
    public function show($slug)
    {
        $slug = str_replace('-', ' ', $slug);
        $cat = $this->request->get('cat') ?: null;
        $cat = $this->append($cat);

        $shots = $this->shots->explore($slug, $cat);

        if(! $shots) {
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


    private function append($cat)
    {
        switch($cat){

            case 'ma':
                return 'men';

            case 'fm':
                return 'women';

            case 'cu':
                return 'couples';

            case 'ki':
                return 'kids';

            Default:
                return null;

        }
    }
}
