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
    private $parentCode;
    private $family;
    private $name;
    private $description;
    private $color;
    private $colors;
    private $size;
    private $material;
    private $capacity;
    private $printing;
    private $printingArea;
    private $height;
    private $width;
    private $length;
    private $countBox;
    private $img;

    public function __construct(
        string $itemCode,
        string $provider,
        ?string $parentCode,
        ?string $family,
        ?string $name,
        ?string $description,
        ?string $color,
        ?array $colors,
        ?string $size,
        ?string $material,
        ?string $capacity,
        ?string $printing,
        ?string $printingArea,
        ?float $height,
        ?float $width,
        ?float $length,
        ?int $countBox,
        ?string $img
    ) {
        $this->itemCode = $itemCode;
        $this->provider = $provider;
        $this->parentCode = $parentCode;
        $this->family = $family;
        $this->name = $name;
        $this->description = $description;
        $this->color = $color;
        $this->colors = $colors;
        $this->size = $size;
        $this->material = $material;
        $this->capacity = $capacity;
        $this->printing = $printing;
        $this->printingArea = $printingArea;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->countBox = $countBox;
        $this->img = $img;
    }
    
    // Getters
    
    public function getItemCode(): string
    {
        return $this->itemCode;
    }
    public function getProvider(): string
    {
        return $this->provider;
    }

    public function getParentCode(): ?string
    {
        return $this->parentCode;
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

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function getColors(): ?array
    {
        return $this->colors;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function getCapacity(): ?string
    {
        return $this->capacity;
    }

    public function getPrinting(): ?string
    {
        return $this->printing;
    }

    public function getPrintingArea(): ?string
    {
        return $this->printingArea;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function getLength(): ?float
    {
        return $this->length;
    }

    public function getCountBox(): ?int
    {
        return $this->countBox;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }
    
    public function toArray(): array
    {
        return [
            'item_code' => $this->getItemCode(),
            'provider' => $this->getProvider(),
            'parent_code' => $this->getParentCode(),
            'family' => $this->getFamily(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'color' => $this->getColor(),
            'colors' => $this->getColors(),
            'size' => $this->getSize(),
            'material' => $this->getMaterial(),
            'capacity' => $this->getCapacity(),
            'printing' => $this->getPrinting(),
            'printing_area' => $this->getPrintingArea(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth(),
            'length' => $this->getLength(),
            'count_box' => $this->getCountBox(),
            'img' => $this->getImg(),
        ];
    }
}
