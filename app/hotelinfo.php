<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotelinfo extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phonenumber', 'address', 'facebookurl', 'twitterurl', 'tripadivsorurl', 'instagramurl', 'youtubeurl'];
}
