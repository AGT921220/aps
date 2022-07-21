@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Categoría</span>
                    <a href="{{ route('ver_carousel') }}" class="btn btn-primary btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('guardar_carousel') }}" enctype="multipart/form-data">
                    @csrf


    

                    <div class="form-group">
                      <label>Imágen</label>
                      <div class="form-group image_container" style="justify-content: center;text-align: center;align-items: center;display: flex;flex-direction: column;margin: auto;">
                              <img class="profile_image_show" style="width:100px;" src="{{ asset('images/no-image.png') }}">
                            <label for="imagen_profile" style="cursor:pointer;">Seleccionar imágen</label>
                            <input style="display: none;" type="file" name="imagen" id="imagen_profile" accept="image/x-png,image/gif,image/jpeg">
                      </div>
                  </div>



                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="{{ asset('js/registro.js') }}" defer></script>