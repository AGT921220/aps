<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
{
    public function index(string $url)
    {
        $categories = Product::select(DB::raw('DISTINCT family'))
            ->get();

        $categories = $categories->map(function ($category) {
            $category->type = ucfirst($category->family);
            $category->family = str_replace(' ', '-', $category->family);
            return $category;
        });
        
        $products = Product::
        where('category', $url)
        ->get();
        $urlMeta = strtoupper(str_replace('-', ' ', $url));

        try {
            return view("page.categories.$url", compact('categories','products','urlMeta'));
        } catch (\Throwable $th) {
            return back();
            return redirect('/new')->with('warning', 'Ésta categoría no se encontró');
        }
    }
}
