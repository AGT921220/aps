<?php

namespace App\Bussines\Erp\Client\Application\Find;

use App\Bussines\Erp\Client\Domain\Client;
use App\Bussines\Erp\Client\Domain\ClientRepository;

final class ClientFinderByName
{
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name): ?Client
    {
        return $this->repository->findByName($name);
    }
}
