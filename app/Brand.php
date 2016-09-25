<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Brand extends Model
{
    
    use PresentableTrait;

    /**
     * Path to Users Presenter Class.
     *
     * @var string
     */
    protected $presenter = 'MyTailor\Presenters\Brands\BrandsPresenter';

    /**
     * A shot is owned by a publisher.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'id')
            ->select(['id', 'username', 'avatar']); //Profile is your profile model
    }

    /**
     * A shot is owned by a publisher.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shots()
    {

        return $this->morphMany(Shot::class, 'publishable');
    }
}