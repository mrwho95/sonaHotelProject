<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class device_user extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'dateIn', 'dateOut', 'guest', 'range', 'duration', 'remoteAddress'];
}
