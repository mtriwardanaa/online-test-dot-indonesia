<?php

namespace App\Console\Commands;

use App\Events\ProvinceFetched;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchProvinceRajaOngkir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'raja-ongkir:fetch:province';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching province from raja ongkir';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $urlRajaOngkir = config('rajaongkir.base_url') . '/province';
        $apiKeyRajaOngkir = config('rajaongkir.api_key');

        $fetchProvince = Http::withHeaders([
            'key' => $apiKeyRajaOngkir,
        ])->get($urlRajaOngkir);
        if ($fetchProvince->failed()) {
            $message = $fetchProvince->json()['rajaongkir']['status']['description'] ?? 'Something went wrong!!!';
            $this->info($message);
            return;
        }

        if ($fetchProvince->status() == 200 && $fetchProvince->successful()) {
            $result = $fetchProvince->json();
            $provinces = $result['rajaongkir']['results'];
            ProvinceFetched::dispatch($provinces);
        }

        $this->info("fetching province from rajaongkir has been successful");
    }
}
