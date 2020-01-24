<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['span'];

    public function cities()
    {
        return $this->hasOne('App\City');
    }
}
