<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use App\DetalleCotizacion;
use App\DetalleProyecto;
use App\Proyecto;
use Illuminate\Http\Request;

class DetalleCotizacionController extends Controller
{
    public function agregar(Request $request){        

        $detalleProyecto = DetalleProyecto::where('proyecto_id',$request->proyecto_id)
        ->where('id',$request->detalle_proyecto_id)
        ->first();
        if(!$detalleProyecto){
            return response()->json(['error' => 'Los datos no son correctos']);
        }

        $cotizacion = Cotizacion::where('user_id',auth()->user()->id)
        ->where('proyecto_id',$request->proyecto_id)
        ->first();

        $detalleCotizacion = new DetalleCotizacion();
        $detalleCotizacion->user_id=auth()->user()->id;
        $detalleCotizacion->cotizacion_id=$cotizacion->id;
        $detalleCotizacion->detalle_proyecto_id=$detalleProyecto->id;
        $detalleCotizacion->cantidad=$detalleProyecto->cantidad;
        $detalleCotizacion->precio=$request->precio;
        $detalleCotizacion->total=$detalleProyecto->cantidad*$request->precio;
        $detalleCotizacion->status='Creado';
        
        if($detalleCotizacion->save()){
            return response()->json(['success' => $cotizacion]);
        }else{
            return response()->json(['error' => 'Ha ocurrido un error al guardar']);
        }
    }


    public function eliminar(Request $request){
        $detalleCotizacion = DetalleCotizacion::where('id',$request->id)
        ->where('user_id',auth()->user()->id)
        ->first();

        if($detalleCotizacion->delete()){
            return response()->json(['success' => 'Eliminado']);
        }else{
            return response()->json(['error' => 'Ha ocurrido un error al eliminar']);
        }

    }

}
