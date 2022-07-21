<?php

namespace App\Http\Controllers\Api;

use App\CarouselInicio;
use App\Http\Controllers\Controller;
use App\InicioImagen;
use App\Titulo;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function lista(Request $request){

        $response['titulo'] = Titulo::where('status','Visible')->select('name')->get()->pluck('name') ;
        $response['titulo2'] = Titulo::where('status2','Visible')->select('name2')->get()->pluck('name2');
        $response['titulo3'] = Titulo::where('status3','Visible')->select('name3')->get()->pluck('name3');
        $response['carousel'] = CarouselInicio::where('status','Visible')->select('imagen')->get()->pluck('imagen');
        $response['imagenes'] = InicioImagen::where('status','Visible')->where('categoria','Primeras')->select('imagen')->get()->pluck('imagen');
        $response['imagenes2'] = InicioImagen::where('status','Visible')->where('categoria','Segundas')->select('imagen')->get()->pluck('imagen');
        return response()->json(['success' => $response]);
    }
}
