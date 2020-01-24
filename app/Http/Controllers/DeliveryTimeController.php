<?php

namespace App\Http\Controllers;

use App\City;
use App\Delivery;
use Illuminate\Http\Request;

class DeliveryTimeController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'delivery_at' => 'required',
        ]);

        $delivery = Delivery::create($validate);

        return response()->json([
            'message' => 'delivery stored !',
        ]);
    }

    
}
