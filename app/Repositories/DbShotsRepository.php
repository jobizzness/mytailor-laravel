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
     */
    public function __construct(Shot $shots){

        $this->shots = $shots;

    }

    /**
     * Shots users view the most/trending.
     * Reddit's Algorithm
     *
     * @param $limit
     * @return mixed
     */
    public function newest($limit){
        return $this->shots
            ->where('published', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit($limit);
    }


    /**
     * Gets shots by a publisher
     *
     * @param $publisher
     * @return mixed
     * @internal param $cat
     */
    public function by($publisher){
        return $publisher->shots()
            ->with('image','comments')
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
    public function explore($tag, $cat)
    {

        return Shot::whereHas('tags', function($query) use ($tag){

                $query->where('tags.tag_name', "$tag");

        })  ->with('image','comments', 'publishable.profile')
            ->select(\DB::raw( '((views - 1) / (TIMESTAMPDIFF(HOUR, created_at, NOW()) + 2)^1.5) as Popularity, shots.*'))
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