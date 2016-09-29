<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['avatar', 'username'];

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
    public function User()
    {
        return $this->belongsTo(User::class);
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
