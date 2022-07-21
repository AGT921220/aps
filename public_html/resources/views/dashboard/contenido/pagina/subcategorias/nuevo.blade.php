@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Sub Categoría</span>
                    <a href="{{ route('ver_subcategorias') }}" class="btn btn-primary btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('guardar_subcategoria') }}" enctype="multipart/form-data">
                    @csrf


    

                    <div class="form-group">
                      <label>Categoría</label>
                        <select name="category"  class="form-control">
                          @foreach($categorias as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                    </div>


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
