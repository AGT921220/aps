<?php

namespace App\Bussines\Erp\Product\Infrastructure;

use App\Bussines\Erp\Product\Domain\Product as DomainProduct;
use App\Bussines\Erp\Product\Domain\ProductRepository;
use App\Bussines\Erp\Product\Domain\ProductResponse;
use App\Bussines\Shared\Infrastructure\BuilderFilter;
use App\Models\Product;

class ProductEloquentRepository implements ProductRepository
{

    private $builderFilter;
    public function __construct(BuilderFilter $builderFilter)
    {
        $this->builderFilter = $builderFilter;
    }
    public function search(? array $filters = []): ProductResponse
    {

        $products = Product::select(
            'id',
            'name',
            'provider',
            'item_code',
            'description',
            'family',
            'material',
            'stock'
        )
        ->whereNull('parent_id')
        ->with('images')
        ->with('childrens');

        $products = $filters?$this->builderFilter->__invoke($products,$filters):$products;
            // dd($products->toSql());
        $products = $products->get();

        $domainProducts = $products->map(function ($product) {
            return (new DomainProduct(
                $product->id,
                $product->item_code,
                $product->provider,
                $product->family,
                $product->name,
                $product->description,
                $product->material,
                $product->stock,
                $product->images,
                $product->childrens
            ));
        });

        return new ProductResponse(
            $products->count(),
            ...$domainProducts
        );
    }
    public function searchWithChildrens(? array $filters = []): ProductResponse
    {
        $products = Product::select(
            'id',
            'name',
            'provider',
            'item_code',
            'description',
            'family',
            'material',
            'stock'
        )
        ->with('images');

        $products = $filters?$this->builderFilter->__invoke($products,$filters):$products;
            // dd($products->toSql());
        $products = $products->get();

        $domainProducts = $products->map(function ($product) {
            return (new DomainProduct(
                $product->id,
                $product->item_code,
                $product->provider,
                $product->family,
                $product->name,
                $product->description,
                $product->material,
                $product->stock,
                $product->images,
                $product->childrens
            ));
        });

        return new ProductResponse(
            $products->count(),
            ...$domainProducts
        );
    }

}
