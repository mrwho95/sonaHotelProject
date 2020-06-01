<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    //
     /* The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'capacity', 'size', 'bed', 'service', 'description', 'photo_1', 'photo_2', 'photo_3'];
}
