<?php

use App\Http\Controllers\Api\ProvinceApi;

Route::controller(ProvinceApi::class)->group(function () {
    Route::get('search/provinces', 'search');
});
