<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerorder extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['booking_code', 'room_bed', 'personal_request', 'bed_preference', 'smoke_preference', 'check-in', 'check-in-time', 'range', 'check_out', 'price_amount', 'service_charge_amount', 'service_tax_amount', 'promo_amount', 'total_amount', 'promocode', 'status'];
}
