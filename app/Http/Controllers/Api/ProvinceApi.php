<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchProvice;
use App\Models\Province;

class ProvinceApi extends Controller
{
    public function search(SearchProvice $request)
    {
        $provinceId = $request->get('id');
        $province = Province::where('province_id', $provinceId)->firstOrFail();
        return response()->json($province);
    }
}
