<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class post extends Model
{
    use PresentableTrait;
    /**
     * Path to Shots Presenter Class.
     *
     * @var string
     */
    protected $presenter = 'MyTailor\Presenters\Posts\PostPresenter';

    protected $fillable = ['author_id', 'title', 'slug', 'body', 'excerpt', 'published_at'];

    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: null;
    }

    public function publisher(){
    	return $this->belongsTo(User::class);
    }
    //
}
