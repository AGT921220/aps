@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Generar Cotización</span>
                    <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                        <span>Agregar Usuario</span>
                        <a href="{{ route('ver_concursos') }}" class="btn btn-primary btn-sm">Volver a concursos...</a>
                    </div>
                </div>


                @if(count($catalogosGral)>=1)
                <div class="">
                

                    <div class="form-group">
                        <label>Seleccione Catálogo</label>
                        <select  id="catalogo_select" class="form-control">
                            @foreach($catalogosGral as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Seleccione Partida</label>
                        <select  id="detalle_proyecto_select" class="form-control">

                        </select>
                    </div>

                    <h4>Agrega Costos</h4>
                    <hr>

                       <div class="form-group">

                        <div class="form-group">
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text"  disabled=""  class="form-control  descripcion_d" />
                            </div>
                        </div>

                        <div class="form-group col-md-2 col-xs-6">
                            <label>Clave</label>
                            <input type="text" disabled=""  class="form-control col-md-4 mb-2 clave_d" />
                        </div>
                        <div class="form-group col-md-2 col-xs-6">
                            <label>Unidad</label>
                            <input type="text" disabled=""  class="form-control col-md-4 mb-2 unidad_d" />
                        </div>

                        <div class="form-group col-md-2 col-xs-6">
                            <label>Cantidad</label>
                            <input type="number" step="any" disabled=""  class="form-control mb-2 cantidad_d" />
                        </div>
                        <div class="form-group col-md-3 col-xs-6" style="    z-index: 10">
                            <label>Precio(Sin IVA)</label>
                            <input type="number" step="any"  class="form-control mb-2 precio_d" required="" />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Total</label>
                            <input type="text" step="any" disabled=""   class="form-control mb-2 total_d"/>
                        </div>

                        <div class="form-group col-md-12" style="    display: flex;
                        flex-direction: row-reverse;">
                            <button class="btn btn-primary btn-sm cotizar_partida">Cotizar Partida</button>
                        </div>
                    </div>




    
                </div>
                @else

                <div>
                    <label>Ya no hay catálogos para cotizar en {{$proyecto->name}}</label>
                </div>
                @endif

                <br><br>
            

<h4>Detalle de Cotizacion</h4>
<hr>
                <div style="overflow-x:scroll">
                <table class="table" id="datatable" style="overflow-x:scroll">
                    <thead>
                        <tr>
                        <th scope="col">Clave</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detallesCotizacion as $item)
                        <tr>
                            <td>{{ $item->clave }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ $item->unidad }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>${{ $item->precio }}</td>
                            <td>${{ $item->total }}</td>                    
                            <td class="actions_table">
                                <button type="button" data-id="{{$item->id}}" class="btn btn-danger btn-sm delete_cotizacion_d eliminar">Eliminar</button>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th scope="col">Clave</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Unidad</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Total</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </tfoot>

                </table>
            </div>



            </div>
        </div>
    </div>
</div>

<input type="hidden" value="{{$proyecto->id}}" id="proyecto_id">
<input type="hidden" value="{{$cotizacion->id}}" id="cotizacion_id">
<input type="hidden" id="csrf_token" value="{{ csrf_token() }}">



<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

@endsection
<style>
    tbody tr td,thead tr th{
        text-align: center;
    }
    .actions_table{
        justify-content: space-evenly;
    }
    .actions_table form{
        display: contents;
        margin: 1em auto;
    }
    </style>


<script src="{{ asset('js/cotizaciones/generar.js') }}" defer></script>
<script src="{{ asset('js/datatables.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">