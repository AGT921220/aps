<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categorias::all();
        return view('dashboard.contenido.pagina.categorias.lista',compact('categorias'));          
    }
    public function nuevo(){
        return view('dashboard.contenido.pagina.categorias.nuevo');  
    }

    public function guardar(Request $request){


        $categoria = new Categorias();
        $categoria->name=$request->name;
        $categoria->status='Visible';

        if($categoria->save()){
            return back()->with('success','Categoría Creada');
        }else{
            return back()->with('error','Hubo un error al crear la categoría');
        }

    }

    public function desactivar($id){
        $categoria = Categorias::findOrFail($id);
        $categoria->status='Invisible';
        if($categoria->save()){
            return back()->with('success','Categoría '.$categoria->name.' Desactivada.');
        }else{
            return back()->with('error','Hubo un error al desactivar la categoría');
        }
    }

    
    public function activar($id){
        $categoria = Categorias::findOrFail($id);
        $categoria->status='Visible';
        if($categoria->save()){
            return back()->with('success','Categoría '.$categoria->name.' Activada.');
        }else{
            return back()->with('error','Hubo un error al activar la categoría');
        }
    }

}
