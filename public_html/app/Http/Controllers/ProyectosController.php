<?php

namespace App\Http\Controllers;

use App\CatalogoGral;
use App\DetalleProyecto;
use App\Proyecto;
use App\Unidad;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para agregar proyectos');            
        }

        $proyectos = Proyecto::
        select('proyectos.*','users.name as cliente')
        ->leftJoin('users','users.id','proyectos.client_id')
        ->get();

        if(auth()->user()->rol=='Director'){
        addEditar('proyectos',$proyectos);
        addGenerar('proyectos',$proyectos);
        }


        return view('dashboard.contenido.proyectos.lista',compact('proyectos'));  
    }

    public function nuevo(){
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para agregar proyectos');            
        }

        return view('dashboard.contenido.proyectos.nuevo');        
    }

    public function guardar(Request $request){
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para guardar proyectos');            
        }

        $proyecto = new Proyecto();
        $request=$request->all();
        $request['status']='Creado';
        $proyecto =agregarRegistro($request,$proyecto,[]);

        if($proyecto->save()){
            return back()->with('success','Proyecto Creado');
        }else{
            return back()->with('error','Hubo un error al crear proyecto');
        }

    }
    public function editar($id){
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para editar proyectos');            
        }

        $proyecto= Proyecto::findOrFail($id);
        return view('dashboard.contenido.proyectos.editar',compact('proyecto'));  
    }

    public function update(Request $request){

        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para editar proyectos');            
        }

        $proyecto = Proyecto::findOrFail($request->id);

        $proyecto =editarRegistro($request->all(),$proyecto,[]);

        if($proyecto->save()){
            return back()->with('success','Proyecto Editado');
        }else{
            return back()->with('error','Hubo un error al editar proyecto');
        }


    }
   
    public function generar($id){
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para generar proyectos');            
        }

        $proyecto= Proyecto::findOrFail($id);
        $catalogosgral=CatalogoGral::all();
        $unidades=Unidad::all();
        $detallesProyecto = DetalleProyecto::
        leftJoin('catalogo_grals','catalogo_grals.id','detalle_proyectos.catalogo','unidads.name as unidad')
        ->leftJoin('unidads','unidads.id','detalle_proyectos.unidad')
        ->select('detalle_proyectos.*','catalogo_grals.name as catalogo')
        ->where('detalle_proyectos.proyecto_id',$proyecto->id)->get();

        return view('dashboard.contenido.proyectos.generar',compact('proyecto','catalogosgral','unidades','detallesProyecto'));  
    }


    public function generar_finish(Request $request){
        if(permisoSection(auth()->user()->rol,['Director','Gerente'])){
            return back()->with('error','No tiene permisos para generar proyectos');            
        }
        $proyecto = Proyecto::where('id',$request->id)->first();
        info($proyecto);
        info($proyecto->status);
        $proyecto->status='Concurso';
        if($proyecto->save()){
            return response()->json(['success' => 'Concurso Generado']);
        }else{
            return response()->json(['error' => 'Error al generar concurso']);
        }


    }

}
