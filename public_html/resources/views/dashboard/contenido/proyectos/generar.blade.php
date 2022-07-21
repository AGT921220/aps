@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Generar Proyecto {{$proyecto->name}}</span>
                    <a href="{{ route('ver_proyectos') }}" class="btn btn-primary btn-sm">Volver a lista de proyectos...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('editar.generar_proyecto') }}" class="form_generar" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

   

<div>


    <div>

        <div class="form-group" style="display: flex;justify-content: space-between;margin: 1em 0 !important;">
            <h4>Agregar Partida</h4>
            <button class="btn btn-primary mt-4">Agregar</button>
        </div>

        <div class="form-group">
            <label>Selecciona el Catálogo</label>
            <select name="catalogo" id="catalogo_gral" class="form-control">
                @foreach($catalogosgral as $item){
                    <option value="{{$item->id}}">{{$item->name}}-{{$item->clave}}</option>
                }
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Selecciona la Unidad</label>
            <select name="unidad" id="unidad" class="form-control">
                @foreach($unidades as $item){
                    <option value="{{$item->id}}">{{$item->name}}</option>
                }
                @endforeach
            </select>
        </div>        
        <div class="form-group">
            <label>Descripcion</label>
            <input type="text"  name="descripcion"  class="form-control mb-2 descripcion_d" required="" {{ old('descripcion') }}/>
        </div>
        <div class="form-group">
            <label>Cantidad</label>
            <input type="number" step="any" name="cantidad"  class="form-control mb-2 cantidad_d" required="" {{ old('cantidad') }}/>
        </div>
        <div class="form-group">
            <label>Precio(Sin IVA)</label>
            <input type="number" name="precio"  step="any"  class="form-control mb-2 precio_d" required="" />
        </div>
        <div class="form-group">
            <label>Total</label>
            <input type="text" step="any" disabled=""  name="total" class="form-control mb-2 total_d" required="" />
        </div>

        
    </div>
  
</div>

<div>


    <hr>
    <label>Partidas</label>

    <div class="partidas_container"></div>
  

    <div class="card-body" style="overflow-x:scroll">
        <table class="table" id="datatable" style="overflow-x:scroll">
            <thead>
                <tr>
                <th scope="col">Clave</th>
                <th scope="col">Catalogo</th>
                <th scope="col">Unidad</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Total</th>
                <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($detallesProyecto as $item)
                <tr>
                    <td>{{ $item->clave }}</td>
                    <td>{{ $item->catalogo }}</td>
                    <td>{{ $item->unidad }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>${{ $item->precio }}</td>
                    <td>${{ $item->total }}</td>
           

                    <td class="actions_table">
                        <button type="button" data-id="{{$item->id}}" class="btn btn-danger btn-sm delete_proyecto_d">Eliminar</button>
                    </td>


                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Catalogo</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                    <th scope="col">Acciones</th>
                </tr>
            </tfoot>

        </table>

    {{-- fin card body --}}
    </div>



</div>


                    <input type="hidden" value="{{$proyecto->id}}" name="proyecto_id" class="proyecto_id">

                    @if(count($detallesProyecto)>=1)
                    <button class="btn btn-primary btn-block create_concurso" data-id="{{$proyecto->id}}" type="button">Crear concurso</button>
                    @endif
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


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
<script src="{{ asset('js/datatables.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
<script src="{{ asset('js/proyectos/generar.js') }}" defer></script>
<style>
    .form-group{
        margin:0px !important;
    }
</style>