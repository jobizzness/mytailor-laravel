<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'id', 'user_id');
    }

    /**
     * A shot can be owned by a Designer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shots() {

        return $this->morphMany(Shot::class, 'publishable');
    }

}
