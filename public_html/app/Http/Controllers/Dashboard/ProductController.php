<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Erp\Product\Domain\Product as DomainProduct;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    public function index()
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
        ->with('childrens')
        ->get();
        $products = $products->map(function($product)
        {
            $product->provider = $this->getProvider($product->provider);
            $product->images_format = $product->images?collect($product->images)->pluck('image')->toArray():null;
            $product->children_stock = $this->getChildrenExistences($product->childrens);
            return $product;
        }); 

        // return $products;
        // return $products->pluck('family')->unique()->values()->all();

        return view('dashboard.content.product.indexOld', compact('products'));

        // $products = Product::all();
        // return view('dashboard.new-products.index',compact('products'));  
    }
    private function getProvider(string $provider)
    {
        if($provider == DomainProduct::PROMOOPTION_TYPE)
        {
            return 'Promo Opción';
        }
        return 'Desconocido';
    }
    private function getChildrenExistences(Collection $childrens):array
    {
        if($childrens->count()==0)
        {
            return null;
        }
        return $childrens->map(function($children)
        {
            return ['color'=>strtolower($children['color']),'stock'=>$children['stock']];
        })->toArray();
    }
    //CHECAR 86400
}
