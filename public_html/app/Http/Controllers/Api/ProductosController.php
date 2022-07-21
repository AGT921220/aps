<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Producto;
use App\Subcategorias;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function lista(Request $request){
        $subcategoria = Subcategorias::findOrFail($request->subcategory);
        $productos = Producto::
//        join('subcategorias','subcategorias.id','productos.subcategory')
        select('imagen')
        ->where('subcategory',$request->subcategory)
        ->where('status','Visible')
        ->get();
        $response['subcategoria']=$subcategoria->name;
        $response['productos']=$productos;
        $response['sub']=$subcategoria;

        return response()->json(['success' => $response]);
    }
}
