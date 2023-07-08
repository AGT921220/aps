<?php

namespace App\Bussines\Erp\Client\Infrastructure;

use App\Bussines\Erp\Client\Domain\Client as DomainClient;
use App\Bussines\Erp\Client\Domain\ClientRepository;
use App\Bussines\Erp\Client\Domain\ClientResponse;
use App\Models\Client;

class ClientEloquentRepository implements ClientRepository
{

    public function save(DomainClient $client): int
    {
        $model = new Client();


        $model->company_name= $client->getCompany();
        $model->person_name= $client->getPerson();
        $model->phone= $client->getPhone();
        $model->second_phone= $client->getSecondPhone();
        $model->email= $client->getEmail();
        $model->second_email= $client->getSecondEmail();
        $model->save();
        return $model->id;
    }

    public function search(): ClientResponse
    {
        $clients = Client::get();

        $domainClients = $clients->map(function ($client) {
            // dd($client->toArray());
            return (new DomainClient(
                $client->company_name,
                $client->person_name,
                $client->phone,
                $client->email,
                $client->second_phone,
                $client->second_email,
                $client->id
            ));
        });

        return new ClientResponse(
            $clients->count(),
            ...$domainClients
        );
    }

    // public function find(int $clientId): ?DomainClient
    // {
    //     $client = Client::find($clientId);
    //     if (!$client) {
    //         return null;
    //     }
    //     return (new DomainClient(
    //         $client->name,
    //         $client->email,
    //         $client->phone,
    //         $client->street,
    //         $client->colony,
    //         $client->no_int,
    //         $client->no_ext,
    //         $client->cp,
    //         $client->observations,
    //         $client->id
    // ));
    // }

    // public function findByName(string $clientName): ?DomainClient
    // {
    //     $client = Client::where('name', $clientName)->first();
    //     if (!$client) {
    //         return null;
    //     }
    //     return (new DomainClient(
    //         $client->name,
    //         $client->email,
    //         $client->phone,
    //         $client->street,
    //         $client->colony,
    //         $client->no_int,
    //         $client->no_ext,
    //         $client->cp,
    //         $client->observations,
    //         $client->id
    // ));
    // }
}
