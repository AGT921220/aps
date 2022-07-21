<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Factura;
use Illuminate\Http\Request;

class FacturasController extends Controller
{

    public function index(){
        $facturas = Factura::join('clientes','clientes.id','facturas.cliente')
        ->select('facturas.*','clientes.company as cliente')
        ->get();


        $porPagarMonto=0;
        $porPagarIva=0;
        $porPagarTotal=0;
        $pagadasMonto=0;
        $pagadasIva=0;
        $pagadasTotal=0;
        foreach($facturas as $factura){
            if($factura->status=='Agregada'){
                $porPagarMonto+=$factura->monto;
                $porPagarIva+=$factura->iva;
                $porPagarTotal+=$factura->total;
            }else{
                $pagadasMonto+=$factura->monto;
                $pagadasIva+=$factura->iva;
                $pagadasTotal+=$factura->total;

            }
        }
        return view('dashboard.contenido.facturas.lista',compact('facturas','porPagarMonto','porPagarIva','porPagarTotal','pagadasMonto','pagadasIva','pagadasTotal'));          
    }
    
    public function nuevo(){
        $clientes = Cliente::all();
        if(count($clientes)<=0){
            return back()->with('error','No existen clientes agregados.');   
        }
        return view('dashboard.contenido.facturas.nuevo',compact('clientes'));  
    }

    public function guardar(Request $request){


        $factura_exist = Factura::where('numero',$request->numero)->first();
        if($factura_exist){
            return back()->with('error','El número de factura ya existe.'); 
        }

        $iva = round($request->monto*0.16,2);
        $total = round($request->monto+$iva,2);

        $factura = new Factura();
        $factura->numero=$request->numero;
        $factura->cliente=$request->cliente;
        $factura->monto=$request->monto;
        $factura->iva=$iva;
        $factura->total=$total;
        $factura->month=$request->month;
        $factura->status='Agregada';

        if($factura->save()){
            return back()->with('success','Factura agregada.');   
        }else{
            return back()->with('error','Ocurrió un error al guardar el cliente.');   
        }
    }


    public function pagar($id){
        $factura = Factura::findOrFail($id);
        $factura->status='Pagada';

        if($factura->save()){
            return back()->with('success','Factura pagada.');   
        }else{
            return back()->with('error','Ocurrió un error al guardar el cliente.');   
        }
    }

}
