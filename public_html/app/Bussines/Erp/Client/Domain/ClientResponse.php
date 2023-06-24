<?php

namespace App\Bussines\Erp\Client\Domain;

class ClientResponse
{
    private $total;
    private $data;


    public function __construct(int $total, Client ...$data)
    {
        $this->total = $total;
        $this->data = $data;
    }

    public function toArray(): array
    {
        return [
            'total' => $this->total,
            'data' => array_map(function (Client $client) {
                return $client->toArray();
            }, $this->data)
        ];
    }
}
