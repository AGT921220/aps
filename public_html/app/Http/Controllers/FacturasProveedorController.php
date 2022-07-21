<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\FacturaProveedor;
use App\Proveedor;
use Illuminate\Http\Request;

class FacturasProveedorController extends Controller
{

    public function index(){

        $facturas = Factura::join('proveedores','provededores.id','factoras_provedors.proveedor')
        ->select('facturas.*','clientes.company as cliente')
        ->get();

        $totalMonto=0;
        $totalIva=0;
        $totalTotal=0;
        foreach($facturas as $factura){
            $totalMonto+=$factura->monto;
            $totalIva+=$factura->iva;
            $totalTotal+=$factura->total;
        }

        return view('dashboard.contenido.facturasProv.lista',compact('facturas','totalMonto','totalIva','totalTotal'));          
    }
    
    public function nuevo(){
        $proveedores = Proveedor::all();
        if(count($proveedores)<=0){
            return back()->with('error','No existen proveedores agregados.');   
        }
        return view('dashboard.contenido.facturasProv.nuevo',compact('proveedores'));  
    }

    public function guardar(Request $request){


        // $factura_exist = FacturaProveedor::where('numero',$request->numero)->first();
        // if($factura_exist){
        //     return back()->with('error','El número de factura ya existe.'); 
        // }

        $iva = round($request->monto*0.16,2);
        $total = round($request->monto+$iva,2);

        $factura = new FacturaProveedor();
        $factura->proveedor=$request->proveedor;
        $factura->monto=$request->monto;
        $factura->iva=$iva;
        $factura->total=$total;
        $factura->month=$request->month;


        if($factura->save()){
            return back()->with('success','Factura agregada.');   
        }else{
            return back()->with('error','Ocurrió un error al guardar el cliente.');   
        }
    }


    public function pagar($id){
        $factura = FacturaProveedor::findOrFail($id);
        $factura->status='Pagada';

        if($factura->save()){
            return back()->with('success','Factura pagada.');   
        }else{
            return back()->with('error','Ocurrió un error al guardar el cliente.');   
        }
    }

}
