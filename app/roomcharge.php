<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomcharge extends Model
{
    //
     /* The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['price', 'service_charge_rate', 'service_charge', 'service_tax_rate', 'service_tax', 'total_amount'];
}
