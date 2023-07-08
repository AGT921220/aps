<?php

namespace App\Http\Controllers\Api;

use App\Bussines\Erp\Product\Application\Search\ProductSearcher;
use App\Bussines\Erp\Product\Application\Search\ProductSearcherWithChildrens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $productSearcher;
    public function __construct(ProductSearcherWithChildrens $productSearcher)
    {
        $this->productSearcher = $productSearcher;
    }
    public function index(Request $request){

        // info($request->input());
        $filters = [['field' => 'products.item_code', 'operator' => 'like', 'value' => $request->input('item_code')]];

        $products = $this->productSearcher->__invoke($filters)->toArray();
        return $products;

        return response()->json(['success' => 1]);
    }
}
