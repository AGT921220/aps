<?php

namespace App\Bussines\Erp\Client\Domain;

class Client
{
    private $id;
    private $company;
    private $person;
    private $phone;
    private $email;
    private $secondPhone;
    private $secondEmail;

    public function __construct(
        string $company,
        string $person,
        string $phone,
        string $email,
        ?string $secondPhone = null,
        ?string $secondEmail = null,
        ?int $id = null
    ) {

        $this->id = $id;
        $this->company = $company;
        $this->person = $person;
        $this->email = $email;
        $this->phone = $phone;
        $this->secondEmail = $secondEmail;
        $this->secondPhone = $secondPhone;
    }


    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'company_name' => $this->getCompany(),
            'person_name' => $this->getPerson(),
            'phone' => $this->getPhone(),
            'email' => $this->getEmail(),
            'second_phone' => $this->getSecondPhone(),
            'second_email' => $this->getSecondEmail(),
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): string
    {
        return $this->company;
    }
    public function getPerson(): string
    {
        return $this->person;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getSecondPhone(): ?string
    {
        return $this->secondPhone;
    }
    public function getSecondEmail(): ?string
    {
        return $this->secondEmail;
    }
}
