@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Empleado</span>
                    <a href="{{ route('ver_catalogogral') }}" class="btn btn-primary btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('editar.guardar_catalogogral') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="form-group">
                      <label>Nombre</label>
                    <input type="text" name="name" placeholder="" value="{{$catalogogral->name}}" class="form-control mb-2" required="" {{ old('name') }}/>
                    </div>



                    <div class="form-group">
                      <label>Clave</label>
                    <input type="text" name="clave" placeholder="" value="{{$catalogogral->clave}}" class="form-control mb-2" required="" {{ old('clave') }}/>
                    </div>








                    <input type="hidden" name="id" value="{{$catalogogral->id}}">

                    <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="{{ asset('js/empleados.js') }}" defer></script>
<link href="{{asset('css/calendario.css') }}" rel='stylesheet' />

