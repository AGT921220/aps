<?php

namespace App\Bussines\Erp\Client\Application\Search;


use App\Bussines\Erp\Client\Domain\ClientRepository;
use App\Bussines\Erp\Client\Domain\ClientResponse;

final class ClientSearcher
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function _invoke():ClientResponse
    {
        return $this->repository->search();
    }
}
