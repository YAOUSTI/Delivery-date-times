<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcludedDeliveryDates extends Model
{
    protected $fillable = ['date', 'city_id', 'delivery_time_id'];
}
