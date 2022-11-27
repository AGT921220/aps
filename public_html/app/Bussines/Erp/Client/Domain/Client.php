<?php

namespace App\Bussines\Erp\Client\Domain;

class Client
{
    private $id;
    private $name;

    public function __construct(
        string $name,
        string $id = null
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    public static function create(
        string $id,
        string $name
    ): self {


        $client = new self(
            $id,
            $name
        );
        return $client;
    }

    public static function update(
        int $id,
        string $name
    ): self {

        $training = new self(
            $id,
            $name
        );
        return $training;
    }


    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
