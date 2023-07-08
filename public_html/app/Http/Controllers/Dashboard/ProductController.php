<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Erp\Product\Application\Search\ProductSearcher;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $productSearcher;
    public function __construct(ProductSearcher $productSearcher)
    {
        $this->productSearcher = $productSearcher;
    }
    public function index()
    {
        // $filters = [['field' => 'products.item_code', 'operator' => 'like', 'value' => 'ANF']];
        $filters =[];
        $products = $this->productSearcher->__invoke($filters)->toArray();
        return view('dashboard.content.product.indexOld', compact('products'));
    }
}
