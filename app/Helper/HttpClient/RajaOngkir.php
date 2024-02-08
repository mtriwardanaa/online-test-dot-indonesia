<?php

namespace App\Helper\HttpClient;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class RajaOngkir
{
    protected $baseUrlRajaOngkir;
    protected $apiKeyRajaOngkir;

    public function __construct()
    {
        $this->baseUrlRajaOngkir = config('rajaongkir.base_url');
        $this->apiKeyRajaOngkir = config('rajaongkir.api_key');
    }

    public function fetchProvince(?string $provinceId)
    {
        try {
            return $this->response(Http::withHeaders([
                'key' => $this->apiKeyRajaOngkir,
            ])->get($this->baseUrlRajaOngkir . '/province?id=' . $provinceId));

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    public function fetchCity(?string $cityId)
    {
        try {
            return $this->response(Http::withHeaders([
                'key' => $this->apiKeyRajaOngkir,
            ])->get($this->baseUrlRajaOngkir . '/city?id=' . $cityId));
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $th->getCode());
        }
    }

    private function response(Response $payload)
    {
        if ($payload->failed()) {
            $message = $payload->json()['rajaongkir']['status']['description'] ?? 'Something went wrong!!!';
            return [
                'code'    => 400,
                'message' => $message,
            ];
        }

        if ($payload->status() == 200 && $payload->successful()) {
            return [
                'code' => 200,
                'data' => $payload->json()['rajaongkir']['results'],
            ];
        }
    }
}
