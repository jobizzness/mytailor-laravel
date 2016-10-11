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
         return $this->shots
            ->with('publishable', 'publishable.profile')
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
        return $this->shots
            ->with('publishable', 'publishable.profile')
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
        return $this->shots
            ->with('publishable', 'publishable.profile')
            ->category($cat)
            ->orderBy('views', 'desc')
            ->orderBy('updated_at', 'desc')
            ->where('published', '=', 1)
            ->where('featured', '=', 1)
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
     * Increments Views of a shot.
     *
     * @param $shot
     */
    public function incrementViews($shot)
    {
        $shot->views++;
        $shot->timestamps = false;
        $shot->save();
        $shot->timestamps = true;
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
        $shots =  $this->paginate($shots['hits'], 8);


        $shots->transform(function ($shot, $key) {
            return (object) $shot;
        });


        $shots->map(function ($shot) {
                $shot->publishable['profile'] = $shot->profile;
                unset($shot->profile);
            return $shot;
        });

        return $shots;


    }

    /**
     * Setiting fields for Posting a shot.
     *
     * @param $file_name
     * @param $publishable_type
     * @param $publishable_id
     * @param $published_by
     * @return Shot
     */
    public static function post($file_name, $publishable_type, $publishable_id, $published_by)
    {
        $shot = new Shot();
        $shot->file_name = $file_name;
        $shot->publishable_type = $publishable_type;
        $shot->publishable_id = $publishable_id;
        $shot->published_by = $published_by;

        return Shot::saver($shot);

    }

    private function paginate($array, $perPage)
    {
        $page = Input::get('page', 1);
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page, ['path' => $this->request->url(), 'query' => $this->request->query()]);
        
    }

}