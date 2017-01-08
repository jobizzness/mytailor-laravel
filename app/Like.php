<?php

namespace MyTailor;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id'];

    public $timestamps = false;
}
