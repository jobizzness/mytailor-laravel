<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')
            ->select(['id', 'profile_id']);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'id', 'profile_id')
            ->select(['id','display_name','avatar']);;
    }

    /**
     * A shot can be owned by a Designer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shots() {

        return $this->morphMany(Shot::class, 'publishable')
            ->select(\DB::raw( '((views - 1) / (TIMESTAMPDIFF(MINUTE, updated_at, NOW()) + 2)^1.5) as Popularity, shots.*'))
            ->orderBy('Popularity', 'desc')
            ->where('published', '=', 1)
            ->groupBy('id')
            ->limit(6);
    }

}
