<?php

namespace App\Http\Controllers;

use App\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        permisoSection(auth()->user()->rol,['Director','Gerente'],'No tiene permisos para agregar unidades');

        $unidades = Unidad::all();
        return view('dashboard.contenido.unidades.lista',compact('unidades'));  
    }

    public function nuevo(){

        permisoSection(auth()->user()->rol,['Director','Gerente'],'No tiene permisos para agregar unidades');

        return view('dashboard.contenido.unidades.nuevo');        
    }

    public function guardar(Request $request){
        permisoSection(auth()->user()->rol,['Director','Gerente'],'No tiene permisos para guardar unidades');
        $catalogogral = new Unidad();

        $exist = buscarExistencia('name',$request->name,'unidads');
        if($exist==1){
            return back()->with('error','El valor '.$request->name.' ya existe.');
        }

        $catalogogral =agregarRegistro($request->all(),$catalogogral,[]);

        if($catalogogral->save()){
            return back()->with('success','Unidad Creada');
        }else{
            return back()->with('error','Hubo un error al crear unidad');
        }

    }

    public function editar($id){
        permisoSection(auth()->user()->rol,['Director','Gerente'],'No tiene permisos para editar unidades');
        $unidad= Unidad::findOrFail($id);
        return view('dashboard.contenido.unidades.editar',compact('unidad'));  
    }

    public function update(Request $request){

        permisoSection(auth()->user()->rol,['Director','Gerente'],'No tiene permisos para editar unidades');
        $unidad = Unidad::findOrFail($request->id);

        $exist = buscarExistenciaEditar('name',$request->name,'unidads',$request->id);
        if($exist==1){
            return back()->with('error','El valor '.$request->name.' ya existe.');
        }

        $unidad =editarRegistro($request->all(),$unidad,[]);

        if($unidad->save()){
            return back()->with('success','Catalogo Editado');
        }else{
            return back()->with('error','Hubo un error al editar catálogo');
        }


    }
    

}
