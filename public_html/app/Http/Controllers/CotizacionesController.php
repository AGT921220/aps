<?php

namespace App\Http\Controllers;

use App\CatalogoGral;
use App\Cotizacion;
use App\DetalleCotizacion;
use App\DetalleProyecto;
use App\Proyecto;
use Illuminate\Http\Request;

class CotizacionesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(permisoSection(auth()->user()->rol,['Director','Subcontratista'])){
            return back()->with('error','No tiene permisos para agregar cotizaciones');            
        }

        $proyectos = Proyecto::all();

        return view('dashboard.contenido.cotizaciones.lista',compact('proyectos'));  
    }

    public function concursos(){
        if(permisoSection(auth()->user()->rol,['Director','Subcontratista'])){
            return back()->with('error','No tiene permisos para agregar cotizaciones');            
        }

        $proyectos = Proyecto::
        leftJoin('cotizacions','cotizacions.proyecto_id','proyectos.id')
        ->select('proyectos.*','cotizacions.status as cotizacionStatus','cotizacions.id as cotizacion')
        ->where('proyectos.status','Concurso')->get();


        if(auth()->user()->rol=='Subcontratista'){
            $cotizaciones = Cotizacion::
            join('detalle_cotizacions','detalle_cotizacions.cotizacion_id','cotizacions.id')
            ->where('cotizacions.user_id',auth()->user()->id)
            ->where('cotizacions.status','Creada')
            ->select('cotizacions.proyecto_id')
            ->groupBy('cotizacions.proyecto_id')
            ->get();


//return $cotizaciones;


            addCotizacion('cotizaciones',$proyectos,$cotizaciones->pluck('proyecto_id')->toArray());
            }
    
        return view('dashboard.contenido.cotizaciones.concursos',compact('proyectos'));  

    }


    public function generar($id){
        if(permisoSection(auth()->user()->rol,['Director','Subcontratista'])){
            return back()->with('error','No tiene permisos para generar cotizaciones');            
        }

        //Proyecto sobre el cual se cotiza
        $proyecto = Proyecto::findOrFail($id);
        $detallesProyecto = DetalleProyecto::where('proyecto_id',$id)->get();


        //Cotización
        $cotizacion = Cotizacion::where('proyecto_id',$proyecto->id)
        ->where('user_id',auth()->user()->id)
        ->first();
        $detallesCotizacion = [];
        if($cotizacion){
            $detallesCotizacion = DetalleCotizacion::
            Join('detalle_proyectos','detalle_proyectos.id','detalle_cotizacions.detalle_proyecto_id')
            ->leftJoin('unidads','unidads.id','detalle_proyectos.unidad')
            ->where('cotizacion_id',$cotizacion->id)
            ->where('user_id',auth()->user()->id)
            ->select('detalle_cotizacions.id','detalle_proyectos.clave','detalle_proyectos.descripcion',
            'unidads.name as unidad','detalle_proyectos.cantidad','detalle_cotizacions.precio','detalle_cotizacions.total','detalle_cotizacions.detalle_proyecto_id')
            ->get();


            $detallesProyecto = DetalleProyecto::where('proyecto_id',$id)
            ->whereNotIn('id',$detallesCotizacion->pluck('detalle_proyecto_id'))
            ->get();

        }else{
            $cotizacion= new Cotizacion();
            $cotizacion->user_id=auth()->user()->id;
            $cotizacion->proyecto_id=$proyecto->id;
            $cotizacion->status='Creada';
            $cotizacion->save();
        }

        $catalogosGral = CatalogoGral::whereIn('id',$detallesProyecto->pluck('catalogo'))
        ->get();

        return view('dashboard.contenido.cotizaciones.generar',compact('proyecto','detallesProyecto','catalogosGral','cotizacion','detallesCotizacion'));
    }


    public function enviar($id){
        if(permisoSection(auth()->user()->rol,['Director','Subcontratista'])){
            return back()->with('error','No tiene permisos para enviar cotizaciones');            
        }

        $cotizacion = Cotizacion::where('user_id',auth()->user()->id)
        ->where('id',$id)
        ->first();
        $detallesCotizacion = DetalleCotizacion::where('user_id',auth()->user()->id)
        ->where('cotizacion_id',$cotizacion->id)
        ->get();


        if(!$cotizacion||count($detallesCotizacion)<=0){
            return back()->with('error','Datos Incorrectos');   
        }

        $cotizacion->status='Enviada';



        if($cotizacion->save()&&$detallesCotizacion = DetalleCotizacion::where('user_id',auth()->user()->id)->where('cotizacion_id',$cotizacion->id)->update(['status' => 'Enviada'])){
            $proyecto = Proyecto::where('id',$cotizacion->proyecto_id)->first();
            return back()->with('success','Cotización de proyecto '.$proyecto->name.' Enviada');   
        }else{
            return back()->with('error','Ocurrió un error al enviar la cotización');   
        }



    }

}
