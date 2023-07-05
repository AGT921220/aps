<?php

namespace App\Bussines\Erp\Product\Domain;

class ProductResponse
{
    private $total;
    private $data;


    public function __construct(int $total, Product ...$data)
    {
        $this->total = $total;
        $this->data = $data;
    }

    public function toArray(): array
    {
        return [
            'total' => $this->total,
            'data' => array_map(function (Product $product) {
                return $product->toArray();
            }, $this->data)
        ];
    }
}
