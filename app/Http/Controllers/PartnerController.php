<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function attach_delivery_time(Request $request, $id)
    {
        $request->validate([
            'delivery_time_id' => 'required',
        ]);

        $partner = Partner::findOrFail($id);
        $delivery = Delivery::findOrFail($request->delivery_time_id);

        $partner->delivery_times()->attach($delivery);

        return $partner;
    }
}
