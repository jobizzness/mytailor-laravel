<?php


namespace MyTailor\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Laracasts\Commander\CommandBus;
use Laracasts\Commander\Events\DispatchableTrait;
use MyTailor\Repositories\DesignersRepositoryInterface;
use MyTailor\Transformers\DesignerShotTransformer;
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
     * @param DesignerShotTransformer $Transformer
     */
    public function __construct(DesignersRepositoryInterface $designers, CommandBus $commandBus, DesignerShotTransformer $Transformer)
    {

        $this->designers = $designers;
        $this->commandBus = $commandBus;
        $this->Transformer = $Transformer;

        parent::__construct();
    }

    /**
     * @return mixed
     */

    public function index()
    {

        $designers = $this->designers->newest(100)->with('user.profile', 'user.shots.image')->paginate(8);

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

}