<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Subcategorias;
use Illuminate\Http\Request;

class SubcategoriasController extends Controller
{
    public function index(){
        $subcategorias = Subcategorias::join('categorias','categorias.id','subcategorias.category')
        ->select('subcategorias.*','categorias.name as categoria')
        ->get();
        return view('dashboard.contenido.pagina.subcategorias.lista',compact('subcategorias'));          
    }

    public function nuevo(){
        $categorias = Categorias::where('status','Visible')
        ->get();
        if(count($categorias)<=0){
            return back()->with('error','No existen categorías activas agregados.');   
        }
        return view('dashboard.contenido.pagina.subcategorias.nuevo',compact('categorias'));  
    }


    public function guardar(Request $request){


        $subcategoria = new Subcategorias();
        $subcategoria->category=$request->category;
        $subcategoria->name=$request->name;
        $subcategoria->status='Visible';

        if($subcategoria->save()){
            return back()->with('success','Sub Categoría Creada');
        }else{
            return back()->with('error','Hubo un error al crear la sub categoría');
        }

    }


    public function desactivar($id){
        $subcategoria = Subcategorias::findOrFail($id);
        $subcategoria->status='Invisible';
        if($subcategoria->save()){
            return back()->with('success','Sub Categoría '.$subcategoria->name.' Desactivada.');
        }else{
            return back()->with('error','Hubo un error al desactivar la categoría');
        }
    }

    
    public function activar($id){
        $subcategoria = Subcategorias::findOrFail($id);
        $subcategoria->status='Visible';
        if($subcategoria->save()){
            return back()->with('success','Sub Categoría '.$subcategoria->name.' Activada.');
        }else{
            return back()->with('error','Hubo un error al activar la categoría');
        }
    }


}
