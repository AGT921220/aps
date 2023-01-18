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
        string $name,
        ?string $email = null,
        ?string $phone = null,
        ?string $street = null,
        ?string $colony = null,
        ?string $noInt = null,
        ?string $noExt = null,
        ?string $cp = null,
        ?string $observations = null
    ): array {
        $client = new Client(
            $name,
            $email,
            $phone,
            $street,
            $colony,
            $noInt,
            $noExt,
            $cp,
            $observations
        );

        $id = $this->repository->create($client);

        $persistedClient = Client::create(
            $name,
            $email,
            $phone,
            $street,
            $colony,
            $noInt,
            $noExt,
            $cp,
            $observations,
            $id
        );

        return $persistedClient->toArray();
    }
}
