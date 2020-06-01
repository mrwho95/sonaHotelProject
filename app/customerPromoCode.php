<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerPromoCode extends Model
{
    //
    /* The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'discount', 'expired', 'availability'];
}
