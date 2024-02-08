<?php

namespace App\Listeners;

use App\Events\CityFetched;
use App\Models\City;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessInsertCity implements ShouldQueue
{

    public bool $afterCommit = true;
    public string $queue = 'fetch-city';
    public int $timeout = 60;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CityFetched $event): void
    {
        if (!empty($event->cities)) {
            $cities = array_map(function ($city) {
                return [
                    'city_id'     => $city['city_id'],
                    'province_id' => $city['province_id'],
                    'type'        => $city['type'],
                    'city_name'   => $city['city_name'],
                    'postal_code' => $city['postal_code'],
                ];
            }, $event->cities);

            City::upsert($cities, ['city_id']);
        }
    }
}
