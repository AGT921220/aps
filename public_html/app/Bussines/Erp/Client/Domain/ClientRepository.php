<?php

namespace App\Bussines\Erp\Client\Domain;


interface ClientRepository
{
    public function save(Client $client): int;
    public function search():ClientResponse;
}
