<?php

namespace App\Bussines\Erp\Product\Domain;

use Illuminate\Support\Collection;

class Product
{
    public const DEMO_TRUE = 1;
    public const DEMO_FALSE = 0;
    public const CATALOG_TYPE = 'catalogo';
    public const EXISTENCE_TYPE = 'existencias';

    public const PROMOOPTION_TYPE = 'promo-option';

    private $id;
    private $itemCode;
    private $provider;
    private $family;
    private $name;
    private $description;
    private $material;
    private $stock;
    private $images;
    private $childrens;


    public function __construct(
        int $id,
        string $itemCode,
        string $provider,
        ?string $family,
        ?string $name,
        ?string $description,
        ?string $material,
        ?string $stock,
        ?Collection $images,
        ?Collection $childrens
    ) {
        $this->id = $id;
        $this->itemCode = $itemCode;
        $this->provider = $provider;
        $this->family = $family;
        $this->name = $name;
        $this->description = $description;
        $this->material = $material;
        $this->stock = $stock;
        $this->images = $images;
        $this->childrens = $childrens;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getItemCode(): string
    {
        return $this->itemCode;
    }
    public function getProvider(): string
    {
        if($this->provider == self::PROMOOPTION_TYPE)
        {
            return 'Promo Opción';
        }
        return 'Desconocido';
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

    public function getStock(): ?string
    {
        return $this->stock;
    }
    public function getImages(): ?array
    {
        return $this->images ? $this->images->pluck('image')->toArray() : null;
    }

    public function getChildrens(): ?array
    {
        return $this->childrens ? $this->getChildrenExistences($this->childrens) : null;
    }
    public function toArray(): array
    {
        return [
            'id'=>$this->getId(),
            'item_code' => $this->getItemCode(),
            'provider' => $this->getProvider(),
            'family' => $this->getFamily(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'material' => $this->getMaterial(),
            'stock' => $this->getStock(),
            'images_format'=>$this->getImages(),
            'children_stock'=>$this->getChildrens()
        ];
    }
    private function getChildrenExistences(Collection $childrens): ?array
    {
        if ($childrens->count() == 0) {
            return null;
        }
        return $childrens->map(function ($children) {
            return ['color' => strtolower($children['color']), 'stock' => $children['stock']];
        })->toArray();
    }
}
