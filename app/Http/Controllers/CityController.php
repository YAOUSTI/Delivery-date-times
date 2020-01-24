<?php

namespace App\Http\Controllers;

use App\City;
use App\Delivery;
use App\ExcludedDeliveryDates;
use App\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::all();
        return response()->json(['cities' => $cities, 'total' => count($cities)]);
    }

    public function show($id)
    {
        $city = City::findOrFail($id);
        return response()->json(['city' => $city]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $city = City::create($validate);
        return response()->json(['message' => 'city was created successfully', 'city' => $city]);
    }


    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $update = $request->validate([
            'name' => 'required',
            'partner_name' => 'required',
            'slug' => 'required',
        ]);

        $city->update($update);
        return response()->json(['message' => 'city was updated successfully', 'city' => $city]);
    }


    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->destroy($id);
        return response()->json(['message' => 'city was deleted successfully']);
    }

    public function delivery_times(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $delivery_time = Delivery::findOrFail($request->delivery_id);

        $city->deliveries()->save($delivery_time);
        $city['delivery_time'] = $delivery_time;
        return response()->json(['city' => $city]);
    }

    public function delivryDatesTimes(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $delivery_time = Delivery::findOrFail($request->delivery_id);

        $date = explode(" ", $delivery_time->created_at, 2);

        $day = date("l", strtotime($date[0]));

        $city->deliveries()->save($delivery_time);
        $city['delivery_time'] = $delivery_time;
        return response()->json(['day name' => $day, 'date' => $date[0], 'city' => $city]);
    }


    public function exclude_delivery_date(Request $request, $id)
    {
        $request->validate([
            'delivery_time_id' => 'required|exists:delivery_times,id',
            'date' => 'required|date',
        ]);
        $date = $request->date;

        $city = City::findOrFail($id);
        $delivery = Delivery::findOrFail($request->delivery_time_id);

        $exclude = ExcludedDeliveryDates::create(['date' => $date, 'city_id' => $id, 'delivery_time_id' => $request->delivery_time_id]);

        return $exclude;
    }

    public function delivery_date_times(Request $request, $id)
    {
        $partner = Partner::where('city_id', $id)->first();
        $dt = $partner->delivery_times()->get();
        $excluded = ExcludedDeliveryDates::all();

        $now = Carbon::now(); ;

        $dates = [];

        for ($c = 0; $c < 3; $c++) {
            $date = $now->addDays($c);
            $todays_exclusions = $excluded->where('date',$date->format('Y-m-d'));
            $todays_dt = $dt;
            $part['date'] = $date->format('Y-m-d');
            $part['day_name'] = $date->format('l');
            if(!empty($todays_exclusions))
            {
                for ($i = 0; $i < count($todays_dt); $i++) {
                        for ($j = 0; $j < count($todays_exclusions); $j++) {
                            if($todays_dt[$i]->id==$todays_exclusions[$j]->delivery_time_id)
                            {
                                $todays_dt->forget($i);
                            }
                    }
                }
            }
            $part['delivery_times'] = $todays_dt;

            array_push($dates, $part);
        }
        return response()->json(['dates' => $dates]);
    }
}
