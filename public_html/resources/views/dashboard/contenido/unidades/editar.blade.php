@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Editar Categoria</span>
                    <a href="{{ route('ver_unidades') }}" class="btn btn-primary btn-sm">Volver a lista de unidades...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('editar.guardar_unidad') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="form-group">
                      <label>Nombre de Unidad</label>
                      <input type="text" name="name" value="{{$unidad->name}}" class="form-control mb-2" required="" {{ old('name') }}/>
                    </div>

                    <input type="hidden" name="id" value="{{$unidad->id}}">

                    <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


