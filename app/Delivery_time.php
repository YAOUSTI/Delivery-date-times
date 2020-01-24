<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery_time extends Model
{
    protected $fillable = ['delivery_at', 'deliveries_id'];

    public function delivery_date()
    {
        return $this->belongsTo(Delivery::class);
    }
}
