<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'partner_name', 'slug'];

    public function deliveries()
    {
        return $this->hasMany('App\Delivery');
    }
}
