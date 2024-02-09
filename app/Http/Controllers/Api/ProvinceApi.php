<?php

namespace App\Http\Controllers\Api;

use App\Helper\HttpClient\RajaOngkir;
use App\Helper\SearchResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchProvice;
use App\Models\Province;

class ProvinceApi extends Controller
{
    public $searchResource;
    protected $rajaOngkir;

    public function __construct(
        RajaOngkir $rajaOngkir
    ) {
        $configSearch = config('search.search_resource');
        $this->searchResource = $configSearch;
        $this->rajaOngkir = $rajaOngkir;
    }

    public function search(SearchProvice $request)
    {
        $provinceId = $request->get('id');

        if ($this->searchResource == SearchResource::DATABASE->value) {
            $province = Province::where('province_id', $provinceId)->firstOrFail();
            return response()->json($province);
        }

        if ($this->searchResource == SearchResource::RAJA_ONGKIR->value) {
            $province = $this->rajaOngkir->fetchProvince($provinceId);
            return response()->json($province['data']);
        }
    }
}
