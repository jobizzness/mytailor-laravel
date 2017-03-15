<?php


namespace MyTailor\Modules\Exploration;


use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Laracasts\Commander\CommandHandler;

class ExploreThingsCommandHandler implements CommandHandler
{
    /**
     * @var Request
     */
    private $request;

    /**
     * ExploreThingsCommandHandler constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    /**
     * @param $command
     * @return mixed|void
     */
    public function handle($command)
    {
        //Get top 5 collection
        $collections = $this->paginate(ExploreCollections::explore($command->collections), 5);
        $shots = $this->paginate(ExploreShots::explore($command->shots), 5);
        $designers = $this->paginate(ExploreDesigners::explore($command->designers), 10);


        return [
            'designers' => $designers,
            'collections' => $collections,
            'shots' => $shots
        ];
    }

    /**
     * Custom Paginator
     *
     * @param $array
     * @param $perPage
     * @return LengthAwarePaginator
     */
    private function paginate($array, $perPage)
    {
        $page = Input::get('page', 1);
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(

            $array->slice($offset, $perPage),

            count($array), $perPage, $page, ['path' => $this->request->url(), 'query' => $this->request->query()]);

    }

}