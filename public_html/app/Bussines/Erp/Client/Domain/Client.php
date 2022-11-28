<?php

namespace App\Bussines\Erp\Client\Domain;

class Client
{
    private $id;
    private $name;

    public function __construct(
        string $name,
        string $email = null,
        string $phone = null,
        string $street = null,
        string $colony = null,
        string $noInt = null,
        string $noExt = null,
        string $cp = null,
        string $observations = null,
        int $id = null
    ) {

        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->street = $street;
        $this->colony = $colony;
        $this->noInt = $noInt;
        $this->noExt = $noExt;
        $this->cp = $cp;
        $this->observations = $observations;
    }

    public static function create(
        string $name,
        string $email = null,
        string $phone = null,
        string $street = null,
        string $colony = null,
        string $noInt = null,
        string $noExt = null,
        string $cp = null,
        string $observations = null,
        int $id = null
    ): self {


        $client = new self(
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
        return $client;
    }

    public static function update(
        string $name,
        string $email = null,
        string $phone = null,
        string $street = null,
        string $colony = null,
        string $noInt = null,
        string $noExt = null,
        string $cp = null,
        string $observations = null,
        int $id = null
    ): self {

        $client = new self(
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
        return $client;
    }


    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'street'=>$this->getStreet(),
            'colony'=>$this->getColony(),
            'no_ext'=>$this->getNoExt(),
            'no_int'=>$this->getNoInt(),
            'cp'=>$this->getCP(),
            'observations'=>$this->getObservations()
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }
    public function getStreet(): ?string
    {
        return $this->street;
    }
    public function getColony(): ?string
    {
        return $this->colony;
    }
    public function getNoInt(): ?string
    {
        return $this->noInt;
    }
    public function getNoExt(): ?string
    {
        return $this->noExt;
    }
    public function getCP(): ?string
    {
        return $this->cp;
    }
    public function getObservations(): ?string
    {
        return $this->observations;
    }
}
