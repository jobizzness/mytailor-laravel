<?php namespace MyTailor;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{

    protected $dates = ['published_at'];

    public function shots(){

        return $this->belongsToMany(Shot::class);
    }

    public function paginateShots()
    {
        return $this->shots()->with('image', 'publishable.profile')->paginate(10);
    }
}
