<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['delivery_at'];
    protected $table = "delivery_times";

    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'partner_delivery_time', 'delivery_time_id', 'partner_id');
    }
}
