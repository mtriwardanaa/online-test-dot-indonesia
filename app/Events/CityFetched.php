<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CityFetched
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $cities;
    /**
     * Create a new event instance.
     */
    public function __construct(array $cities)
    {
        $this->cities = $cities;
    }
}
