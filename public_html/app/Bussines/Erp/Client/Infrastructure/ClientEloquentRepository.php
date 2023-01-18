<?php

namespace App\Bussines\Erp\Client\Infrastructure;

use App\Bussines\Erp\Client\Domain\Client as DomainClient;
use App\Bussines\Erp\Client\Domain\ClientRepository;
use App\Bussines\Erp\Client\Domain\ClientResponse;
use App\Models\Client;

class ClientEloquentRepository implements ClientRepository
{

    public function create(DomainClient $client): int
    {
        $model = new Client();
        $model->name= $client->getName();
        $model->email= $client->getEmail();
        $model->phone= $client->getPhone();
        $model->street= $client->getStreet();
        $model->colony= $client->getColony();
        $model->no_int= $client->getNoInt();
        $model->no_ext= $client->getNoExt();
        $model->cp= $client->getCP();
        $model->observations= $client->getObservations();
        $model->save();
        return $model->id;
    }

    public function search(): ClientResponse
    {
        $clients = Client::get();

        $domainClients = $clients->map(function ($client) {
            return (new DomainClient(
                $client->name,
                $client->email,
                $client->phone,
                $client->street,
                $client->colony,
                $client->no_int,
                $client->no_ext,
                $client->cp,
                $client->observations,
                $client->id
            ));
        });

        return new ClientResponse(
            $clients->count(),
            ...$domainClients
        );
    }

    public function find(int $clientId): ?DomainClient
    {
        $client = Client::find($clientId);
        if (!$client) {
            return null;
        }
        return (new DomainClient(
            $client->name,
            $client->email,
            $client->phone,
            $client->street,
            $client->colony,
            $client->no_int,
            $client->no_ext,
            $client->cp,
            $client->observations,
            $client->id
    ));
    }

    public function findByName(string $clientName): ?DomainClient
    {
        $client = Client::where('name', $clientName)->first();
        if (!$client) {
            return null;
        }
        return (new DomainClient(
            $client->name,
            $client->email,
            $client->phone,
            $client->street,
            $client->colony,
            $client->no_int,
            $client->no_ext,
            $client->cp,
            $client->observations,
            $client->id
    ));
    }
}
