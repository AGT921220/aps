<?php

namespace App\Bussines\Erp\Product\Infrastructure;

use App\Bussines\Erp\Product\Domain\ProductRepository;

class ProductEloquentRepository implements ProductRepository
{

    // public function search(): ProductResponse
    // {
    //     $products = Product::get();

    //     $domainProducts = $products->map(function ($product) {
    //         // dd($product->toArray());
    //         return (new DomainProduct(
    //             $product->company_name,
    //             $product->person_name,
    //             $product->phone,
    //             $product->second_phone,
    //             $product->email,
    //             $product->second_email,
    //             $product->id
    //         ));
    //     });

    //     return new ProductResponse(
    //         $products->count(),
    //         ...$domainProducts
    //     );
    // }
}
