<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customersearch extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dateIn', 'dateOut', 'duration', 'user_id','range', 'guest'];

}
