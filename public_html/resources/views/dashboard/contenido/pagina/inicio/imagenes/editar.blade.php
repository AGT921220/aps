@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Editar imágen</span>
                    <a href="{{ route('ver_inicio_imagenes') }}" class="btn btn-primary btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('editar.guardar_inicio_imagen') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="form-group">
                      <label>Categoría</label>
                          <select name="categoria" class="form-control" id="">
                            <option value="Primeras" @if($imagen->categoria=='Primeras') selected="true" @endif>Primeras</option>
                            <option value="Segundas" @if($imagen->categoria=='Segundas') selected="true" @endif>Segundas</option>
                          </select>
                  </div>



                  <div class="form-group">
                    <label>Imágen</label>
                    <div class="form-group image_container" style="justify-content: center;text-align: center;align-items: center;display: flex;flex-direction: column;margin: auto;">
                            <img class="profile_image_show" style="width:100px;" src="{{ asset($imagen->imagen) }}">
                          <label for="imagen_profile" style="cursor:pointer;">Seleccionar imágen</label>
                          <input style="display: none;" type="file" name="imagen" id="imagen_profile" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                </div>





                    <input type="hidden" name="id" value="{{$imagen->id}}">

                    <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


