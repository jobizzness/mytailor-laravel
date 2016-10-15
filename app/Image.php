<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get the shot associated with this image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shot()
    {
        return $this->belongsTo(Shot::class);
    }
}
