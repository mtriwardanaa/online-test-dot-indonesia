<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchCity;
use App\Models\City;

class CityApi extends Controller
{
    public function search(SearchCity $request)
    {
        $cityId = $request->get('city_id');
        $city = City::where('city_id', $cityId)->firstOrFail();
        return response()->json($city);
    }
}
