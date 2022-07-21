<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Subcategorias;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(){
        $productos = Producto::all();
        $productos = Producto::join('subcategorias','subcategorias.id','productos.subcategory')
        ->join('categorias','categorias.id','subcategorias.category')
        ->where('categorias.status','Visible')
        ->where('subcategorias.status','Visible')
        ->select('categorias.name as categoria','subcategorias.name as subcategoria','productos.*')
        ->get();

        return view('dashboard.contenido.pagina.productos.lista',compact('productos'));          
    }
    public function nuevo(){
        $subcategorias = Subcategorias::where('status','Visible')->get();
        if(count($subcategorias)<=0){
            return back()->with('error','No existen sub categorías activas agregadas.');   
        }
        return view('dashboard.contenido.pagina.productos.nuevo',compact('subcategorias'));   
    }

    public function guardar(Request $request){


        $file = $request->imagen;
        $filename = trim($request->imagen->getClientOriginalName());
        $filename= trim($filename);
        $imageName = explode('.',$filename);
        $file->move(public_path().'/images/articulos',$filename);
        $foto = 'images/articulos/'.$filename;

        $producto = new Producto();
        $producto->name=$imageName[0];
        $producto->subcategory=$request->subcategory;
        $producto->imagen=$foto;
        $producto->status='Visible';

        if($producto->save()){
            return back()->with('success','Producto Creado');
        }else{
            return back()->with('error','Hubo un error al crear el producto');
        }

    }

    public function desactivar($id){
        $producto = Producto::findOrFail($id);
        $producto->status='Invisible';
        if($producto->save()){
            return back()->with('success','Categoría '.$producto->name.' Desactivado.');
        }else{
            return back()->with('error','Hubo un error al desactivar el producto');
        }
    }

    
    public function activar($id){
        $producto = Producto::findOrFail($id);
        $producto->status='Visible';
        if($producto->save()){
            return back()->with('success','Categoría '.$producto->name.' Activad.');
        }else{
            return back()->with('error','Hubo un error al activar el producto');
        }
    }


}
