<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['avatar', 'display_name'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get the user associated with the profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Owner()
    {
        return $this->belongsTo(User::class)
            ->select(['id', 'first_name', 'last_name']);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors or Getters
    |--------------------------------------------------------------------------
    |
    */
    public function getAvatarAttribute($value)
    {
       return !$value? 'avatar.png' : $value;

    }
}
