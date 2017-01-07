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

}
