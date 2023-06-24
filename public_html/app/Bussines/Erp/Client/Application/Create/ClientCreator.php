<?php


namespace App\Bussines\Erp\Client\Application\Create;

use App\Bussines\Erp\Client\Domain\Client;
use App\Bussines\Erp\Client\Domain\ClientRepository;

class ClientCreator
{
    /**
     *
     * @var App\Business\Shared\Training\Domain\TrainingRepository
     */
    private $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $company,
        string $person,
        string $phone,
        string $email,
        ?string $secondPhone = null,
        ?string $secondEmail = null
    ): int {

        $client = new Client(
            $company,
            $person,
            $phone,
            $email,
            $secondPhone,
            $secondEmail
        );

        return $this->repository->save($client);
    }
}
