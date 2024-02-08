<?php

namespace App\Listeners;

use App\Events\ProvinceFetched;
use App\Models\Province;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessInsertProvince implements ShouldQueue
{

    public bool $afterCommit = true;
    public string $queue = 'fetch-province';
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
    public function handle(ProvinceFetched $event): void
    {
        if (!empty($event->provinces)) {
            Province::upsert($event->provinces, ['province_id']);
        }
    }
}
