<?php

namespace App\Bussines\Shared\PromoOption\Infrastructure;

use GuzzleHttp\Client;

class PromoOptionClient
{
    private $user;
    private $apiKey;
    public function __construct()
    {
        $this->user = config('app.promo_option_user');
        $this->apiKey = config('app.promo_option_api_key');
    }
    public function __invoke(string $type, ?int $demo = 1)
    {

        $headers = [
            'user' => $this->user,
            'x-api-key' => $this->apiKey,
        ];

        $client = new Client([
            'verify' => false, // Desactivar verificación SSL, se recomienda usarlo solo en entornos de desarrollo
        ]);

        $response = $client->post("https://www.contenidopromo.com/wsds/mx/$type/", [
            'headers' => $headers,
            'form_params' => [
                'demo' => $demo,
            ],
        ]);

        $result = $response->getBody()->getContents();

        return json_decode($result, true);
    }
}
