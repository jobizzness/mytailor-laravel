<?php namespace MyTailor\Repositories;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use MyTailor\Image;
use MyTailor\Shot;

class DbShotsRepository implements ShotsRepositoryInterface{


    /**
     * @var Shots
     */
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
            ->with('image','comments', 'publishable.profile')
            ->category($cat)
            ->orderBy('updated_at', 'desc')
            ->orderBy('views', 'desc')
            ->orderBy('id', 'desc')
            ->where('published', '=', 1)
            ->paginate(8);
    }

    /**
     * Shots users view the most/trending.
     * Reddit's Algorithm
     *
     * @param $cat
     * @return mixed
     */
    public function trending($cat){
        return $this->shots
            ->with('image','comments', 'publishable.profile')
            ->select(\DB::raw( '((views - 1) / (TIMESTAMPDIFF(MINUTE, updated_at, NOW()) + 2)^1.5) as Popularity, shots.*'))
            ->category($cat)
            ->orderBy('Popularity', 'desc')
            ->where('published', '=', 1)
            ->groupBy('id')
            ->paginate(8);
    }

    /**
     * Gets the latest trending shot with a particular tag
     *
     *
     * @param $tag
     * @return mixed
     * @internal param $cat
     */
    public function trendingShotsIn($tag){
        return $this->shots
            ->with('image')
            ->select(\DB::raw( '((views - 1) / (TIMESTAMPDIFF(DAY, updated_at, NOW()) + 2)^1.5) as Popularity, shots.*'))
            ->tag($tag)
            ->orderBy('updated_at', 'desc')
            ->orderBy('Popularity', 'desc')
            ->where('published', '=', 1);
    }

    /**
     * Gets shots that are featured orderd by popularity.
     *
     * @param $cat
     * @return mixed
     */
    public function featured($cat){
        return $this->shots
            ->with('image','comments', 'publishable.profile')
            ->category($cat)
            ->select(\DB::raw( '((views - 1) / (TIMESTAMPDIFF(MINUTE, updated_at, NOW()) + 2)^1.5) as Popularity, shots.*'))
            ->orderBy('Popularity', 'desc')
            ->where('published', '=', 1)
            ->where('featured', '=', 1)
            ->paginate(8);
    }

    /**
     * Gets shots that are featured orderd by popularity.
     *
     * @param $id
     * @return mixed
     * @internal param $cat
     */
    public function byUser($id){
        return $this->shots
            ->with('image','comments', 'publishable.profile')
            ->where('publishable_id', $id)
            ->where('publishable_type','!=', 'MyTailor\\Brand')
            //->select(\DB::raw( '((views - 1) / (TIMESTAMPDIFF(MINUTE, updated_at, NOW()) + 2)^1.5) as Popularity, shots.*'))
            ->orderBy('created_at', 'desc')
            ->where('published', '=', 1)
            ->paginate(9);
    }

    /**
     * Find a shot by its file_name.
     *
     * @param $name
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findByName($name)
    {
       return Shot::with('image','publishable.profile', 'comments')->where('file_name',
           '=', $name)
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

        $searchValues = preg_split('/\s+/', $slug);

        unset($searchValues[0]);
        unset($searchValues[1]);

        return Shot::whereHas('tags', function($query) use ($searchValues){

            foreach ($searchValues as $value) {
                $query->orWhere('tags.tag_name', 'LIKE', "%$value%");
            }

        })  ->with('image','comments', 'publishable.profile')
            ->select(\DB::raw( '((views - 1) / (TIMESTAMPDIFF(HOUR, updated_at, NOW()) + 2)^1.5) as Popularity, shots.*'))
            ->category($cat)
            ->orderBy('Popularity', 'desc')
            ->paginate(8);

    }

    /**
     * Set fields for Posting a shot.
     *
     * @param $publishable_type
     * @param $publishable_id
     * @param $published_by
     * @param $UploadedImage
     * @return Shot
     */
    public static function post($publishable_type, $publishable_id, $published_by, $UploadedImage)
    {
        $image = new Image();
        $image->small = $UploadedImage->small();
        $image->original = $UploadedImage->original();
        $image->phone = $UploadedImage->phone();
        $image->medium = $UploadedImage->medium();
        $image->large = $UploadedImage->large();
        $image->save();

        $shot = new Shot();
        $shot->file_name = $UploadedImage->getName();
        $shot->publishable_type = $publishable_type;
        $shot->publishable_id = $publishable_id;
        $shot->published_by = $published_by;
        $shot->published_at = Carbon::now();
        $shot->image_id = $image->id;

        return Shot::saver($shot);
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
        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page, ['path' => $this->request->url(), 'query' => $this->request->query()]);
        
    }

}