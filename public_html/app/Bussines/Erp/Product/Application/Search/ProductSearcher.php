<?php

namespace App\Bussines\Erp\Product\Application\Search;

use App\Bussines\Erp\Product\Domain\ProductRepository;
use App\Bussines\Erp\Product\Domain\ProductResponse;

class ProductSearcher
{
    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function __invoke(? array $filters = []):ProductResponse
    {
        return $this->productRepository->search($filters);
    }
}
