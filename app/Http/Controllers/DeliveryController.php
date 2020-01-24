<?php

namespace App\Http\Controllers;

use App\City;
use App\Delivery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    public function index()
    {
        $deliveries = Delivery::all();
        return response()->json(['deliveries' => $deliveries, 'total' => count($deliveries)]);
    }

    public function show($id)
    {
        $delivery = Delivery::findOrFail($id);
        return response()->json(['delivery' => $delivery]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'span' => 'required',
            'city_id' => 'required'
        ]);

        $delivery = Delivery::create($validate);
        return response()->json(['message' => 'delivery was created successfully', 'delivery' => $delivery]);
    }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);
        $update = $request->validate([
            'span' => 'required',
            'city_id' => 'required'
        ]);

        $delivery->update($update);
        return response()->json(['message' => 'delivery was updated successfully', 'delivery' => $delivery]);
    }


    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->destroy($id);
        return response()->json(['message' => 'delivery was deleted successfully']);
    }
}
