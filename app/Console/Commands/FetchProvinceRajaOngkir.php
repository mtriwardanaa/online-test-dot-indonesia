<?php

namespace App\Console\Commands;

use App\Events\ProvinceFetched;
use App\Helper\HttpClient\RajaOngkir;
use Illuminate\Console\Command;

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
    public function handle(RajaOngkir $rajaOngkir): void
    {
        $fetchProvince = $rajaOngkir->fetchProvince(null);
        if ($fetchProvince['code'] != 200) {
            $this->info($fetchProvince['message']);
            return;
        }

        $provinces = $fetchProvince['data'];
        ProvinceFetched::dispatch($provinces);

        $this->info("fetching province from rajaongkir has been successful");
    }
}
