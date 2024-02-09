<?php

namespace Tests\Unit;

use App\Helper\HttpClient\RajaOngkir;
use App\Helper\SearchResource;
use App\Http\Controllers\Api\CityApi;
use App\Http\Controllers\Api\ProvinceApi;
use App\Http\Requests\SearchCity;
use App\Http\Requests\SearchProvice;
use App\Models\City;
use App\Models\Province;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use WithFaker;

    public function test_insert_province_database()
    {
        $province = Province::factory()->create();

        $request = Mockery::mock(SearchProvice::class);
        $request->shouldReceive('get')->andReturn($province->province_id);

        $provinceModelMock = Mockery::mock(Province::class);
        $provinceModelMock->shouldReceive('with->where->firstOrFail')->andReturn($province);

        $provinceApi = new ProvinceApi(new RajaOngkir());
        $provinceApi->searchResource = SearchResource::DATABASE->value;
        $provinceApi->province = $provinceModelMock;

        $response = $provinceApi->search($request);
        $this->freshDb($province->province_id);
        $this->assertJson($response->getContent());

    }

    public function test_insert_city_database()
    {
        $city = City::factory()->create();

        $request = Mockery::mock(SearchCity::class);
        $request->shouldReceive('get')->andReturn($city->city_id);

        $cityModelMock = Mockery::mock(City::class);
        $cityModelMock->shouldReceive('with->where->firstOrFail')->andReturn($city);

        $cityApi = new CityApi(new RajaOngkir());
        $cityApi->searchResource = SearchResource::DATABASE->value;
        $cityApi->province = $cityModelMock;

        $response = $cityApi->search($request);
        $this->freshDb($city->province_id);
        $this->assertJson($response->getContent());

    }

    private function freshDb(string $provinceId)
    {
        Province::where('province_id', $provinceId)->delete();
    }
}
