<?php

namespace App\Console\Commands;

use App\Events\CityFetched;
use App\Helper\HttpClient\RajaOngkir;
use Illuminate\Console\Command;

class FetchCityRajaOngkir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'raja-ongkir:fetch:city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching city from raja ongkir';

    /**
     * Execute the console command.
     */
    public function handle(RajaOngkir $rajaOngkir): void
    {
        $fetchCity = $rajaOngkir->fetchCity(null);
        if ($fetchCity['code'] != 200) {
            $this->info($fetchCity['message']);
            return;
        }

        $cities = $fetchCity['data'];
        CityFetched::dispatch($cities);

        $this->info("fetching city from rajaongkir has been successful");
    }
}
