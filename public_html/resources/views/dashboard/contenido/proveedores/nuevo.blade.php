@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Proveedor</span>
                    <a href="{{ route('ver_proveedores') }}" class="btn btn-primary btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('guardar_proveedor') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                      <label>Empresa</label>
                      <input type="text" name="company" placeholder="Nombre de la empresa" class="form-control mb-2" required="" {{ old('company') }}/>
                    </div>



                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="name" placeholder="Nombre" class="form-control mb-2" required="" {{ old('name') }}/>
                    </div>




                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" name="lname" placeholder="Apellido" class="form-control mb-2" required="" {{ old('lname') }}/>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
