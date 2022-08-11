<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
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

        return view("page.categories.$url", compact('categories'));
    }
}
