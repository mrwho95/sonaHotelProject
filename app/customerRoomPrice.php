<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerRoomPrice extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['price_amount', 'service_charge_amount', 'service_tax_amount', 'promo_amount', 'total_amount'];
}
