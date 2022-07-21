<?php

namespace App\Http\Controllers;

use App\Proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{

    public function index(){
        $proveedores = Proveedor::all();
        return view('dashboard.contenido.proveedores.lista',compact('proveedores'));          
    }

    public function nuevo(){
        return view('dashboard.contenido.proveedores.nuevo');  
    }

    public function guardar(Request $request){
        $proveedor = new Proveedor();
        $proveedor->company=$request->company;
        $proveedor->name=$request->name;
        $proveedor->lname=$request->lname;

        if($proveedor->save()){
            return back()->with('success','proveedor agregado.');   
        }else{
            return back()->with('error','Ocurrió un error al guardar el proveedor.');   
        }
    }

    public function editar($id){
        $proveedor = Proveedor::findOrFail($id);
        return view('dashboard.contenido.proveedores.editar',compact('proveedor'));     
    }

    public function update(Request $request){
        $proveedor = Proveedor::findOrFail($request->id);
        $proveedor->company=$request->company;
        $proveedor->name=$request->name;
        $proveedor->lname=$request->lname;

        if($proveedor->save()){
            return back()->with('success','proveedor actualizado.');   
        }else{
            return back()->with('error','Ocurrió un error al actualizar el proveedor.');   
        }
    }

    public function eliminar($id){
        $proveedor= Proveedor::findOrFail($id);
        
        if($proveedor->delete()){
            return back()->with('success','proveedor eliminado.');   
        }else{
            return back()->with('error','Ocurrió un error al eliminar el proveedor.');   
        }
    }
}
