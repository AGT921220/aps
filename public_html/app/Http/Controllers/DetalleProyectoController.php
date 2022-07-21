<?php

namespace App\Http\Controllers;

use App\CatalogoGral;
use App\Cotizacion;
use App\DetalleCotizacion;
use App\DetalleProyecto;
use App\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleProyectoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function guardar(Request $request){

        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return response()->json(['error' => 'No tiene permisos para guardar detalle']);    
        }

        $proyecto = Proyecto::findOrFail($request->data['proyecto_id']);

        $detalleProyecto = new DetalleProyecto();
        $request=$request->data;
        $request['total']=$request['cantidad']*$request['precio'];
        $request['status']='Creado';
        $request['user_created']=auth()->user()->id;

        $catalogoGral = CatalogoGral::findOrFail($request['catalogo']);
        $detallesProyecto = DetalleProyecto::where('proyecto_id',$proyecto->id)
        ->orderBy('updated_at','asc')
        ->get();

        $count = 1;
        foreach($detallesProyecto as $item){
            $catalogo = CatalogoGral::findOrFail($item->catalogo);
            $item->clave=$catalogo->clave.$count;
            $item->save();
            $count++;
        }

        $request['clave']=$catalogoGral->clave.count($detallesProyecto)+1;


        $detalleProyecto =agregarRegistro($request,$detalleProyecto,[]);

        if($detalleProyecto->save()){
            $detallesProyecto = DetalleProyecto::where('proyecto_id',$proyecto->id)->get();
            return response()->json(['success' => $detallesProyecto]);
        }else{
            return response()->json(['error' => 'Error al crear el detalle']);
        }
    }

    public function eliminar(Request $request){
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return response()->json(['error' => 'No tiene permisos para eliminar detalle']);    
        }

        $detalle=DetalleProyecto::where('id',$request['id'])->first();


        $proyecto = Proyecto::where('id',$detalle->proyecto_id)->first();

        if(!$detalle->delete()){
            return response()->json(['error' => 'Error al eliminar el detalle']);
        }
        

        $detallesProyecto = DetalleProyecto::where('proyecto_id',$proyecto->id)
        ->orderBy('updated_at','asc')
        ->get();


        $count = 1;
        foreach($detallesProyecto as $item){
            $catalogo = CatalogoGral::findOrFail($item->catalogo);
            $item->clave=$catalogo->clave.$count;
            $item->save();
            $count++;
        }


        return response()->json(['success' => $detallesProyecto]);

    }


    public function obtener(Request $request){

        $catalogoGral = CatalogoGral::where('id',$request->catalogo_id)->first();
        $proyecto = Proyecto::where('id',$request->proyecto_id)->first();
        $cotizacion = Cotizacion::where('proyecto_id',$request->proyecto_id)
        ->where('user_id',auth()->user()->id)
        ->first();
        $detallesCotizacion = [];
        if($cotizacion){
            $detallesCotizacion = DetalleCotizacion::where('cotizacion_id',$cotizacion->id)
            ->where('user_id',auth()->user()->id)
            ->get();
            $detallesCotizacion=$detallesCotizacion->pluck('detalle_proyecto_id');
        }
        $detallesProyecto = DetalleProyecto::
        join('unidads','unidads.id','detalle_proyectos.unidad')
        ->where('proyecto_id',$proyecto->id)
        ->where('catalogo',$catalogoGral->id)
        ->whereNotIn('detalle_proyectos.id',$detallesCotizacion)
        ->select('detalle_proyectos.id','clave','descripcion','cantidad','unidads.name as unidad')
        ->get();


        return response()->json(['success' => $detallesProyecto]);
    }

}
