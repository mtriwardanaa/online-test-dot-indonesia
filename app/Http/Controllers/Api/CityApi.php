<?php

namespace App\Http\Controllers\Api;

use App\Helper\HttpClient\RajaOngkir;
use App\Helper\SearchResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchCity;
use App\Models\City;

class CityApi extends Controller
{
    protected $searchResource;
    protected $rajaOngkir;

    public function __construct(
        RajaOngkir $rajaOngkir
    ) {
        $configSearch = config('search.search_resource');
        $this->searchResource = $configSearch;
        $this->rajaOngkir = $rajaOngkir;
    }

    public function search(SearchCity $request)
    {
        $cityId = $request->get('id');
        if ($this->searchResource == SearchResource::DATABASE->value) {
            $city = City::with('province')->where('city_id', $cityId)->firstOrFail();
            return response()->json($city);
        }

        if ($this->searchResource == SearchResource::RAJA_ONGKIR->value) {
            $city = $this->rajaOngkir->fetchCity($cityId);
            return response()->json($city['data']);
        }
    }
}
