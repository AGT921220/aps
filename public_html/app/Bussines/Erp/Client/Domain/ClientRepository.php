<?php

namespace App\Bussines\Erp\Client\Domain;


interface ClientRepository
{
    // public function create(Training $training): string;
    public function search():ClientResponse;
    // public function update(Training $updatedTraining): array;
    // public function publish(Training $training): array;
    // public function find(int $trainingId): Training;
}
