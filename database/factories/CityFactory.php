<?php

namespace Database\Factories;

use App\Helper\CityType;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $province = Province::factory()->create();
        return [
            'city_id'     => fake()->unique()->randomNumber(8),
            'province_id' => $province->province_id,
            'type'        => CityType::KABUPATEN->value,
            'city_name'   => Str::random(10),
            'postal_code' => fake()->unique()->randomNumber(5),
        ];
    }
}
