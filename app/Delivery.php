<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['span', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function delivery_times()
    {
        return $this->hasMany(Delivery_time::class);
    }
}
