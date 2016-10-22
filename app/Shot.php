<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use MyTailor\Modules\Shots\Events\ShotWasPosted;

class Shot extends Model {

    use EventGenerator, AlgoliaEloquentTrait, PresentableTrait;

    /**
     * Path to Shots Presenter Class.
     *
     * @var string
     */
    protected $presenter = 'MyTailor\Presenters\Shots\ShotsPresenter';
    /*
    |--------------------------------------------------------------------------
    | Actions
    |--------------------------------------------------------------------------
    |
    */

    protected $fillable = ['title', 'category', 'featured', 'published', 'views', 'source_url', 'description',
                            'published_by', 'published_at'];


    protected $dates = ['published_at'];


    protected $appends = array('alt');


    public $algoliaSettings = [
                 'attributesForFaceting' => ["category", "tags"]
        ];


    /*
    |--------------------------------------------------------------------------
    | CRUD Actions
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Store a shot and raise a new event.
     *
     * @param $shot
     * @return
     */
    public static function saver($shot)
    {
        $shot->save();
        $shot->raise(new ShotWasPosted($shot));

        return $shot;

    }

    /*
    |--------------------------------------------------------------------------
    | Local Scopes
    |--------------------------------------------------------------------------
    |
    */
    /**
     * if there is a where_clause we send it through.
     *
     *
     * @param $query
     * @param $cat
     * @return mixed
     */
    public function scopeCategory($query, $cat) {
            if ($cat) {

                return $query->whereCategory($cat);

            }
            return $query;
    }


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get the Comments associated with the given Shot.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the tags associated with the given Shot.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags() {

        return $this->belongsToMany(Tag::class);
     }

    /**
     * A shot is owned by a publisher.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publishable() {

        return $this->morphTo()
            ->select(['id','profile_id']);
    }


    /**
     * A shot must have an image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(Image::class,'id', 'image_id');
    }

    // I AM NOT SURE ABOUT THIS
    public function scopeExplore($query, $search)
    {
        return $query->where('tags.tag_name', 'LIKE', "%$search%");
    }

    /*
    |--------------------------------------------------------------------------
    |  Accessors OR getters
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @param $value
     * @return string
     */
    public function getCategoryAttribute($value)
    {

        switch ($value) {
            case 'fm':
                $value = 'women';
                break;
            case 'ma':
                $value = 'men';
                break;
            case 'ki':
                $value = 'kids';
                break;
            case'cu':
                $value = 'couples';
                break;

            default:
                $value = null;

        }
        return $value;
    }


    /**
     * @return mixed
     */
    public function getAltAttribute(){

        return $this->displayAlt();
    }

    /**
     * @return mixed
     */
    public function getDescriptionAttribute($desc)
    {
        if(empty($desc)){

            return 'Latest African fashion, Ankara, kitenge, African women dresses, African prints, African men\'s fashion, Nigerian style, Ghanaian fashion';
        }

        return $desc;
    }

    /**
     * Gets published_At attribute as a boolean.
     *
     * @param $value
     * @return bool
     */
    public  function getPublishedAttribute($value) {

        return (boolean) $value;
    }

    /**
     * Gets featured attribute to a boolean.
     *
     * @param $value
     * @return bool
     */
    public  function getFeaturedAttribute($value) {

        return (boolean) $value;
    }

    /**
     * Get a list of tag ids associated with the current shot.
     *
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }

    /*
    |--------------------------------------------------------------------------
    | Mutators OR setters
    |--------------------------------------------------------------------------
    |
    */

    /**
     * @param $value
     * @return string
     */
    public function setCategoryAttribute($value)
    {

        switch ($value) {
            case 'women':
                $value = 'fm';
                break;
            case 'men':
                $value = 'ma';
                break;
            case 'kids':
                $value = 'ki';
                break;
            case'couples':
                $value = 'cu';
                break;

            default:
                $value = null;

        }
        $this->attributes['category'] =  $value;
    }

    /**
     * Return null if published at is empty.
     *
     * @param $value
     */
    public function setPublishedAtAttribute($value){

        $this->attributes['published_at'] = $value ?: null;
    }

    /*
    |--------------------------------------------------------------------------
    | Algolia Configurations
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Algolia Batch record.
     *
     * @return array
     *
     */
    public function getAlgoliaRecord()
    {

        /**
         * Load the tags relation so that it's available
         *
         */
        $this->tags->lists('id', 'tag_name');
        $this->image();
        $this->publishable()->profile();
        $this->comments();

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Appends
    |--------------------------------------------------------------------------
    |
    */

    private function displayAlt()
    {
        $title = $this->title;
        $desc = $this->desc;

        !empty($title) ?
            $alt = substr($title, 0, 30) : $alt = substr($desc, 0, 30);

        return $alt;
    }

    /**
     * Index only when enviroment is not Local.
     *
     * @return bool
     */
    public function autoIndex()
    {
        if (\App::environment() === 'local') {
            return false;
        }

        return true;
    }

    /**
     * Delete only when environment is not local.
     *
     * @return bool
     */
    public function autoDelete(){
            if (\App::environment() === 'local') {
            return false;
            }

        return true;
    }
}
