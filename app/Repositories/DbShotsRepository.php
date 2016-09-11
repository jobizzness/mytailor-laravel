<?php

namespace MyTailor\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use MyTailor\Shot;

class DbShotsRepository implements ShotsRepositoryInterface{

    protected $shots;
    /**
     * @var Request
     */
    private $request;

    /**
     * DbShotsRepository constructor.
     * @param Shot $shots
     * @param Request $request
     */
    public function __construct(Shot $shots, Request $request){

        $this->shots = $shots;


        $this->request = $request;
    }

    /**
     * latest shots from our storage
     * @param $cat
     * @return mixed
     */
    public function latest($cat) {
        return $shots = $this->shots
            ->category($cat)
            ->orderBy('updated_at', 'desc')
            ->orderBy('views', 'desc')
            ->orderBy('id', 'desc')
            ->where('published', '=', 1)
            ->paginate(8);

    }

    /**
     * Shots users view the most/trending.
     *
     * Reddit's Algorithm
     *
     * @param $cat
     * @return mixed
     */
    public function trending($cat){
        return $shots = $this->shots

            ->select(\DB::raw( '((views - 1) / (TIMESTAMPDIFF(HOUR, updated_at, NOW()) + 2)^1.5) as Popularity, shots.*'))
            ->category($cat)
            ->orderBy('Popularity', 'desc')
            ->where('published', '=', 1)
            ->groupBy('id')
            ->paginate(8);
    }
    /**
     * Gets shots that are featured orderd by popularity.
     *
     * @param $cat
     * @return mixed
     */
    public function featured($cat){
        return $shots = $this->shots
            ->category($cat)
            ->orderBy('views', 'desc')
            ->orderBy('updated_at', 'desc')
            ->where('published', '=', 1)
            ->paginate(8);
    }

    /**
     * Find a shot by its file_name.
     *
     * @param $name
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findByName($name)
    {
       return Shot::with('publishable', 'tags')->where(

            \DB::raw("left(file_name, length(file_name) - LOCATE('.', Reverse(file_name)))"
            ), '=', $name)
            ->first();
    }

    /**
     * Get Related shots and order by popularity.
     *
     * @param $shot
     * @return mixed
     */
    public function related($shot)
    {
        $tag_ids = $shot->tags()->lists('id');

        return Shot::whereHas('tags', function($q) use ($tag_ids) {
            $q->whereIn('id', $tag_ids);
        })
            ->orderBy('updated_at', 'desc')
            ->whereNotIn('id', [$shot->id])
            ->paginate(8);
    }

    /**
     * Look around for shots that have keywords in $slug
     *
     * @param $slug
     * @param $cat
     * @return \stdClass
     * @internal param array $facets
     */
    public function explore($slug, $cat)
    {
        $cat ? $facets = ['filters' => "category:$cat"] : $facets = null;

        $shots = Shot::search($slug, $facets);

        return $this->paginate($shots['hits'], 8);


    }

    /**
     * Setiting fields for Posting a shot.
     * @param $file_name
     * @param $publishable_type
     * @param $publishable_id
     * @return Shot
     */
    public static function post($file_name, $publishable_type, $publishable_id)
    {
        $shot = new Shot();
        $shot->file_name = $file_name;
        $shot->publishable_id = $publishable_type;
        $shot->publishable_id = $publishable_id;

        Shot::saver($shot);

    }

    private function paginate($array, $perPage)
    {
        $page = Input::get('page', 1);
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page, ['path' => $this->request->url(), 'query' => $this->request->query()]);
        
    }

}