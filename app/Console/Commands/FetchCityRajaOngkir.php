<?php

namespace App\Console\Commands;

use App\Events\CityFetched;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

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
    public function handle(): void
    {
        $urlRajaOngkir = config('rajaongkir.base_url') . '/city';
        $apiKeyRajaOngkir = config('rajaongkir.api_key');

        $fetchCity = Http::withHeaders([
            'key' => $apiKeyRajaOngkir,
        ])->get($urlRajaOngkir);
        if ($fetchCity->failed()) {
            $message = $fetchCity->json()['rajaongkir']['status']['description'] ?? 'Something went wrong!!!';
            $this->info($message);
            return;
        }

        if ($fetchCity->status() == 200 && $fetchCity->successful()) {
            $result = $fetchCity->json();
            $cities = $result['rajaongkir']['results'];
            CityFetched::dispatch($cities);
        }

        $this->info("fetching city from rajaongkir has been successful");
    }
}
