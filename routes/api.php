<?php

use App\Http\Controllers\Api\CityApi;
use App\Http\Controllers\Api\ProvinceApi;

Route::controller(ProvinceApi::class)->group(function () {
    Route::get('search/provinces', 'search');
});

Route::controller(CityApi::class)->group(function () {
    Route::get('search/cities', 'search');
});
