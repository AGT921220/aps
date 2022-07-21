@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Unidad</span>
                    <a href="{{ route('ver_unidades') }}" class="btn btn-primary btn-sm">Volver a lista de unidades...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('guardar_unidad') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                      <label>Nombre de Unidad</label>
                      <input type="text" name="name" placeholder="Nombre de unidad" class="form-control mb-2" required="" {{ old('name') }}/>
                    </div>



                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


