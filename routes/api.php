<?php

use App\Http\Controllers\Api\CityApi;
use App\Http\Controllers\Api\ProvinceApi;
use App\Http\Controllers\Api\TokenApi;

Route::controller(ProvinceApi::class)->middleware('auth:api')->group(function () {
    Route::get('search/provinces', 'search');
});

Route::controller(CityApi::class)->middleware('auth:api')->group(function () {
    Route::get('search/cities', 'search');
});

Route::controller(TokenApi::class)->group(function () {
    Route::post('tokens', 'issueToken');
});
