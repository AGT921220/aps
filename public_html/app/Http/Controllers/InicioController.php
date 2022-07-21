<?php

namespace App\Http\Controllers;

use App\Titulo;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function ver_titulo(){
        $titulo = Titulo::first();
//        return $titulo;
        return view('dashboard.contenido.pagina.inicio.titulo.lista',compact('titulo'));       
    }

    public function editar_titulo(Request $request){

        $titulo = new Titulo();
        $titulo->status='Visible';
        $titulo->status2='Visible';
        $titulo->status3='Visible';

        if(isset($request->id)){
            $titulo = Titulo::findOrFail($request->id);        
        }
        $titulo->name=$request->name;
        $titulo->name2=$request->name2;
        $titulo->name3=$request->name3;
        if($titulo->save()){
            return back()->with('success','Titulo Guardado.');
        }else{
            return back()->with('error','Hubo un error al guardar el título');
        }
    }

    public function desactivar_titulo($id){
        $titulo = Titulo::findOrFail($id);
        $titulo->status='Invisible';
        if($titulo->save()){
            return back()->with('success','Título Desactivado.');
        }else{
            return back()->with('error','Hubo un error al desactivar el Título');
        }
    }

    
    public function activar_titulo($id){
        $titulo = Titulo::findOrFail($id);
        $titulo->status='Visible';
        if($titulo->save()){
            return back()->with('success','Título Activado.');
        }else{
            return back()->with('error','Hubo un error al activar el Título');
        }
    }


    public function desactivar_titulo2($id){
        $titulo = Titulo::findOrFail($id);
        $titulo->status2='Invisible';
        if($titulo->save()){
            return back()->with('success','Título 2 Desactivado.');
        }else{
            return back()->with('error','Hubo un error al desactivar el Título 2');
        }
    }

    
    public function activar_titulo2($id){
        $titulo = Titulo::findOrFail($id);
        $titulo->status2='Visible';
        if($titulo->save()){
            return back()->with('success','Título 2 Activado.');
        }else{
            return back()->with('error','Hubo un error al activar el Título 2');
        }
    }

    public function desactivar_titulo3($id){
        $titulo = Titulo::findOrFail($id);
        $titulo->status3='Invisible';
        if($titulo->save()){
            return back()->with('success','Título 2 Desactivado.');
        }else{
            return back()->with('error','Hubo un error al desactivar el Título 2');
        }
    }

    
    public function activar_titulo3($id){
        $titulo = Titulo::findOrFail($id);
        $titulo->status3='Visible';
        if($titulo->save()){
            return back()->with('success','Título 3 Activado.');
        }else{
            return back()->with('error','Hubo un error al activar el Título 2');
        }
    }

}
