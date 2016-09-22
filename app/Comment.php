<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'published_by'];

    /**
     * A comment is commented on a commentable.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * A comment is published by a publisher.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function publishable()
    {
        return $this->morphTo()
            ->select(['id','profile_id']);
    }
}
