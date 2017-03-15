<?php


namespace MyTailor\Modules\Exploration;


use Illuminate\Support\Facades\App;

class ExploreDesigners implements ExplorationInterface
{

    /**
     * @param $items
     */
    public static function explore($items)
    {
        //Generate The Score
        return $items->transform(function ($item, $key) {
            //Calculating ups based on comments * 8, shares * 10
            // views * 2, likes * 4
            //$ups = ($item->views * 2) + ($item->like_count * 4) + (8) + (10);

            $generateScore = ExploreDesigners::getScoreGenerator();

            $item->popularity = $generateScore->hotness(5, 0, 6565656565656);

            return $item;
        });

    }

    private static function getScoreGenerator()
    {
        return App::make('\MyTailor\Modules\Core\RankingEngine\ScoreGenerator');
    }
}