<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// i exclude create and edit methodes
Route::resource('/cities', 'CityController')->only(['index', 'show', 'store', 'update', 'destroy']);

Route::post('/cities/{id}/delivery_times','CityController@delivery_times');
Route::post('/partners/{id}/delivery_times','PartnerController@attach_delivery_time');
Route::post('/cities/{id}/exclude_dates','CityController@exclude_delivery_date');

Route::get('cities/{id}/delivery-date-times','CityController@delivery_date_times');

// {number_of_days_to_get}

// i exclude create and edit methodes
Route::resource('/delivery-times', 'DeliveryTimeController')->only('index', 'show', 'store', 'update', 'destroy');
