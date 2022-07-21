<?php

namespace App\Http\Controllers;

use App\CarouselInicio;
use Illuminate\Http\Request;

class CarouselInicioController extends Controller
{
    public function index(){
        $carousels = CarouselInicio::all();
        return view('dashboard.contenido.pagina.inicio.carousel.lista',compact('carousels'));          
    }

    public function nuevo(){
        return view('dashboard.contenido.pagina.inicio.carousel.nuevo');  
    }

    public function guardar(Request $request){


        $file = $request->imagen;
        $filename = trim($request->imagen->getClientOriginalName());
        $filename= trim($filename);
        $imageName = explode('.',$filename);
        $file->move(public_path().'/images/inicio/carousel',$filename);
        $foto = 'images/inicio/carousel/'.$filename;

        $carousel = new CarouselInicio();
        $carousel->imagen=$foto;
        $carousel->status='Visible';

        if($carousel->save()){
            return back()->with('success','Imágen Agregada al Carousel');
        }else{
            return back()->with('error','Hubo un error al agregar la imágen al Carousel');
        }

    }

    public function desactivar($id){
        $carousel = CarouselInicio::findOrFail($id);
        $carousel->status='Invisible';
        if($carousel->save()){
            return back()->with('success','Imágen Desactivada.');
        }else{
            return back()->with('error','Hubo un error al desactivar la imágen');
        }
    }

    
    public function activar($id){
        $carousel = CarouselInicio::findOrFail($id);
        $carousel->status='Visible';
        if($carousel->save()){
            return back()->with('success','Imágen Activada.');
        }else{
            return back()->with('error','Hubo un error al activar la imágen');
        }
    }






}
