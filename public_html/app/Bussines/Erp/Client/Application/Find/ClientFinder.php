<?php

namespace App\Bussines\Erp\Client\Application\Find;

use App\Bussines\Erp\Client\Domain\Client;
use App\Bussines\Erp\Client\Domain\ClientRepository;

final class ClientFinder
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $clientId): ?Client
    {
        return $this->repository->find($clientId);
    }
}
