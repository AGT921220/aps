<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Product;
use App\Subcategorias;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Product::select(DB::raw('DISTINCT family'))
            ->get();

        $categories = $categories->map(function ($category) {
            $category->type = ucfirst($category->family);
            $category->family = str_replace(' ', '-', $category->family);
            return $category;
        });
        return view('page.index', compact('categories'));
    }

    private function getSections()
    {
        $sections = [
         'bebidas',
         'bienestar',
         'botargas',
         'calendarios',
         'escritura',
         'hogar-herramientas',
         'llaveros',
         'loncheras-hieleras',
         'mochilas-bolsas',
         'niños',
         'oficina',
         'recnologia',
         'textiles',
         'viaje'
        ];
        return collect($sections);
    }
    public function home()
    {
        $categorias = Categorias::where('status', 'Visible')->get();

        foreach ($categorias as  $item) {
            $item->subcategorias  = Subcategorias::where('status', 'Visible')->where('category', $item->id)->get();
        }
        return view('home', compact('categorias'));
    }
}
