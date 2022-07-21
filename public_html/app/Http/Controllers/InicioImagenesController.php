<?php

namespace App\Http\Controllers;

use App\InicioImagen;
use Illuminate\Http\Request;

class InicioImagenesController extends Controller
{
    public function index(){
        $imagenes = InicioImagen::all();
        return view('dashboard.contenido.pagina.inicio.imagenes.lista',compact('imagenes'));          
    }

    public function nuevo(){
        return view('dashboard.contenido.pagina.inicio.imagenes.nuevo');  
    }

    public function editar($id){
        $imagen = InicioImagen::findOrFail($id);
        return view('dashboard.contenido.pagina.inicio.imagenes.editar',compact('imagen'));  
    }

    public function store(Request $request){

            $imagen= InicioImagen::findOrFail($request->id);
            $imagen->categoria=$request->categoria;
    
            if( isset($request->imagen) ){
                $file = $request->imagen;
                $filename = trim($request->imagen->getClientOriginalName());
                $filename= trim($filename);
                $imageName = explode('.',$filename);
                $file->move(public_path().'/images/inicio/imagenes',$filename);
                $foto = 'images/inicio/imagenes/'.$filename;
                $imagen->imagen=$foto;
            }
    
            if($imagen->save()){
                return back()->with('success','Imágen Modificada');
            }else{
                return back()->with('error','Hubo un error al modificar Imágen');
            }
        
    
    }

    public function guardar(Request $request){


        $file = $request->imagen;
        $filename = trim($request->imagen->getClientOriginalName());
        $filename= trim($filename);
        $imageName = explode('.',$filename);
        $file->move(public_path().'/images/inicio/imagenes',$filename);
        $foto = 'images/inicio/imagenes/'.$filename;

        $imagen = new InicioImagen();
        $imagen->imagen=$foto;
        $imagen->categoria=$request->categoria;
        $imagen->status='Visible';

        if($imagen->save()){
            return back()->with('success','Imágen Agregada');
        }else{
            return back()->with('error','Hubo un error al agregar la imágen');
        }

    }

    public function desactivar($id){
        $imagen = InicioImagen::findOrFail($id);
        $imagen->status='Invisible';
        if($imagen->save()){
            return back()->with('success','Imágen Desactivada.');
        }else{
            return back()->with('error','Hubo un error al desactivar la imágen');
        }
    }

    
    public function activar($id){
        $imagen = InicioImagen::findOrFail($id);
        $imagen->status='Visible';
        if($imagen->save()){
            return back()->with('success','Imágen Activada.');
        }else{
            return back()->with('error','Hubo un error al activar la imágen');
        }
    }


}

