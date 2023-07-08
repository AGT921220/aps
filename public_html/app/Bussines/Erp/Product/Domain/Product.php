<?php

namespace App\Bussines\Erp\Product\Domain;

class Product
{
    public const DEMO_TRUE = 1;
    public const DEMO_FALSE = 0;
    public const CATALOG_TYPE = 'catalogo';
    public const EXISTENCE_TYPE = 'existencias';

    public const PROMOOPTION_TYPE = 'promo-option';

    private $itemCode;
    private $provider;
    private $family;
    private $name;
    private $description;
    private $material;
    private $capacity;

    public function __construct(
        string $itemCode,
        string $provider,
        ?string $family,
        ?string $name,
        ?string $description,
        ?string $material,
        ?string $capacity
    ) {
        $this->itemCode = $itemCode;
        $this->provider = $provider;
        $this->family = $family;
        $this->name = $name;
        $this->description = $description;
        $this->material = $material;
        $this->capacity = $capacity;
    }
        
    public function getItemCode(): string
    {
        return $this->itemCode;
    }
    public function getProvider(): string
    {
        return $this->provider;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function getCapacity(): ?string
    {
        return $this->capacity;
    }

    public function toArray(): array
    {
        return [
            'item_code' => $this->getItemCode(),
            'provider' => $this->getProvider(),
            'family' => $this->getFamily(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'material' => $this->getMaterial(),
            'capacity' => $this->getCapacity()
        ];
    }
}
