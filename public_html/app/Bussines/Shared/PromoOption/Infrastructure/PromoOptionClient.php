<?php

namespace App\Bussines\Shared\PromoOption\Infrastructure;

use Exception;
use GuzzleHttp\Client;

class PromoOptionClient
{
    private $user;
    private $apiKey;
    private $apiPassword;
    private const PRODUCTS_URL = 'https://promocionalesenlinea.net/api/all-products';
    private const STOCKS_URL = 'https://promocionalesenlinea.net/api/all-stocks';

    public function __construct()
    {
        $this->user = config('app.promo_option_user');
        $this->apiKey = config('app.promo_option_api_key');
        $this->apiPassword = config('app.promo_option_api_password');

    }
    public function getProducts()
    {

        $client = new Client([
            'verify' => false
        ]);

        try {
            $response = $client->post(self::PRODUCTS_URL, [
                'multipart' => [
                    [
                        'name' => 'user',
                        'contents' => $this->user
                    ],
                    [
                        'name' => 'password',
                        'contents' => $this->apiPassword
                    ]
                ]
            ]);
        
            $result = $response->getBody()->getContents();
            
            $result = json_decode($result, true)['response'];
            // info($result);
            return $result;	
            return json_decode($result, true)['response'];
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getStocks()
    {

        $client = new Client([
            'verify' => false
        ]);

        try {
            $response = $client->post(self::STOCKS_URL, [
                'multipart' => [
                    [
                        'name' => 'user',
                        'contents' => $this->user
                    ],
                    [
                        'name' => 'password',
                        'contents' => $this->apiPassword
                    ]
                ]
            ]);
        
            $result = $response->getBody()->getContents();
            return json_decode($result, true)['Stocks'];
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
