@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Editar Proveedor</span>
                    <a href="{{ route('ver_proveedores') }}" class="btn btn-primary btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('editar.guardar_proveedor') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="form-group">
                      <label>Empresa</label>
                    <input type="text" name="company" placeholder="" value="{{$proveedor->company}}" class="form-control mb-2" required="" {{ old('company') }}/>
                    </div>



                    <div class="form-group">
                      <label>Nombre</label>
                    <input type="text" name="name" placeholder="" value="{{$proveedor->name}}" class="form-control mb-2" required="" {{ old('name') }}/>
                    </div>



                    <div class="form-group">
                      <label>Apellido</label>
                    <input type="text" name="lname" placeholder="" value="{{$proveedor->lname}}" class="form-control mb-2" required="" {{ old('lname') }}/>
                    </div>








                    <input type="hidden" name="id" value="{{$proveedor->id}}">

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

