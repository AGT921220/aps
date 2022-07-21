@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Categoría</span>
                    <a href="{{ route('ver_categorias') }}" class="btn btn-primary btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('guardar_categoria') }}" enctype="multipart/form-data">
                    @csrf


    


                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="name"  class="form-control mb-2" required="" {{ old('name') }}/>
                    </div>

             

                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
