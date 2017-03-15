<?php


namespace MyTailor\Modules\Shots;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Laracasts\Commander\CommandHandler;
use MyTailor\Modules\Core\RankingEngine\ScoreGenerator;
use MyTailor\Repositories\DbShotsRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ShowGlobalFeedCommandHandler implements CommandHandler
{
    /**
     * @var DbShotsRepository
     */
    private $shots;
    /**
     * @var ScoreGenerator
     */
    private $generateScore;
    /**
     * @var Request
     */
    private $request;


    /**
     * ShowMyFeedCommandHandler constructor.
     * @param DbShotsRepository $shots
     * @param ScoreGenerator $generateScore
     * @param Request $request
     * @internal param ScoreGenerator $scoreBy
     */
    public function __construct(DbShotsRepository $shots, ScoreGenerator $generateScore, Request $request)
    {
        $this->shots = $shots;
        $this->generateScore = $generateScore;
        $this->request = $request;
    }

    public function handle($command)
    {
        $shots = $command->shots;

        //Generate The Score
        $shots->transform(function ($item, $key) {
            //Calculating ups based on comments * 8, shares * 10
            // views * 2, likes * 4
            $ups = ($item->views * 2) + ($item->like_count * 4) + (8) + (10);
            $item->popularity = $this->generateScore->hotness($ups, 0, $item->created_at->timestamp);

            return $item;
        });

        return $this->paginate($shots->sortByDesc('popularity'), 8);

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