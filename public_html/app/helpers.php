<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

function calculateDate($items){
    foreach($items as $item){

        $actual = Carbon::now();
        $item->edad = Carbon::parse($item->fecha_nacimiento)->age.' años.';

    }
}

function permisoSection($rol,$users){
        if(!in_array($rol,$users)){
            return true;
        }

}
function permisoSectionApi($rol,$users,$texto){

    if(!in_array($rol,$users)){

        return response()->json(['error' => $texto]);
        return response()->json(['error' => $texto]);
    }

}


function agregarRegistro($request,$registro,$omitido){
    foreach($request as $key=>$item){
        info($key.'--'.$item);
        if($key!="_token"&&$key!='_method'&&$key!='datatable_length'&&!is_numeric($key)&&!in_array($key,$omitido)){
            $registro->$key=$item;
        }

    }
    return $registro;
}

function editarRegistro($request,$registro,$omitido){
    foreach($request as $key=>$item){

        if($key!="_token"&&$key!='_method'&&!in_array($key,$omitido)){
            $registro->$key=$item;
        }

    }
    return $registro;
}
function buscarExistencia($item,$valor,$tabla){

    $exist = DB::table($tabla)->where($item,'=',$valor)->first();
    if($exist){        
        return 1;
    }
        return 0;
}

function buscarExistenciaEditar($item,$valor,$tabla,$id){

    $exist = DB::table($tabla)->where($item,'=',$valor)
    ->where('id','!=',$id)->first();
    if($exist){        
        return 1;
    }
        return 0;
}
function addEditar($module,$items){
    foreach($items as $item){      
        defineActions($item);
        if($item->status=='Creado'){
            $item->actions.='<a  href="/'.$module.'/editar/'.$item->id.'" class="btn btn-primary">Editar</a>';
        }
    }
}

function addGenerar($module,$items){
    foreach($items as $item){
        defineActions($item);
        if($item->status=='Creado'){
            $item->actions.='<a  href="/'.$module.'/generar/'.$item->id.'" class="btn btn-success">Generar</a>';
        }
    }
}
function addCotizacion($module,$items,$cotizaciones){

    foreach($items as $item){
        defineActions($item);
        if($item->status=='Concurso'&&$item->cotizacionStatus!='Enviada'){
            $item->actions.='<a  href="/'.$module.'/generar/'.$item->id.'" class="btn btn-success">Generar Cotización</a>';
        }
        if($item->cotizacionStatus=='Enviada'){
            $item->actions.='Cotización Enviada';
        }
        
        if(in_array($item->id,$cotizaciones)){
            $item->actions.='<a  href="/'.$module.'/enviar/'.$item->cotizacion.'" class="btn btn-primary">Enviar Cotización</a>';
        }
        
    }
}
function addEliminar($module,$items){
    foreach($items as $item){
        defineActions($item);
        if($item->status=='Creado'){
            $item->actions.='<a  href="/'.$module.'/editar/'.$item->id.'" class="btn btn-primary">Eliminar</a>';
        }
    }
}
function defineActions($item){
    if(!isset($item->actions)){$item->actions='';} 
}