<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['name'];

    public function city()
    {
        return $this->hasOne(City::class);
    }
    public function delivery_times()
    {
        return $this->belongsToMany(Delivery::class, 'partner_delivery_time', 'partner_id', 'delivery_time_id');
    }
}
