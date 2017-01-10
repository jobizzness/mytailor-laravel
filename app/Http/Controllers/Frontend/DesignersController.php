<?php


namespace MyTailor\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Laracasts\Commander\CommandBus;
use Laracasts\Commander\Events\DispatchableTrait;
use MyTailor\Repositories\DesignersRepositoryInterface;
use MyTailor\Transformers\DesignerTransformer;

class DesignersController extends ApiController
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
     * @param DesignersRepositoryInterface $designers
     * @param CommandBus $commandBus
     * @param DesignerTransformer $Transformer
     */
    public function __construct(DesignersRepositoryInterface $designers, CommandBus $commandBus, DesignerTransformer $Transformer)
    {

        $this->designers = $designers;
        $this->commandBus = $commandBus;
        $this->Transformer = $Transformer;
    }

    /**
     * @param $sort
     * @param Request $request
     * @return mixed
     */

    public function index(Request $request)
    {

        $designers = $this->getDesigners($request);

        if(! $designers) {
            //we have no designers sorry.
            return $this->NotFound('No results Found');
        }


        //means we have shots so lets send them through.
        return $this->respond([
            'response' => [
                'designers' => [
                    'data' => $this->Transformer->transformCollection($designers),
                    'nextPage' => $designers->nextPageUrl()
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

    public function shots($username)
    {
        $shots = $this->designers->shots($username);
    }


    /**
     * @param $sort
     * @param Request $request
     * @return mixed
     */
    protected function getDesigners(Request $request)
    {

        $cat = $request->get('cat') ?: null;
        $sort = $request->get('sort') ?: null;
        switch ($sort) {
            case 'latest':
                $shots = $this->designers->featured($cat);
                break;
            case 'popular':
                $shots = $this->designers->latest($cat);
                break;
            case 'favorites':
                $shots = $this->designers->latest($cat);
                break;
            case 'showcase':
                $shots = $this->designers->latest($cat);
                break;
            Default:
                $shots = $this->designers->local($cat);
                return $shots;
        }
        return $shots;
    }

}