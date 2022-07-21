@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Usuario</span>
                    <a href="{{ route('ver_usuarios') }}" class="btn btn-primary btn-sm">Volver a lista de usuarios...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('guardar_usuario') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="name" placeholder="Nombre" class="form-control mb-2" required="" {{ old('name') }}/>
                    </div>

                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" name="lname" placeholder="Apellido" class="form-control mb-2" required="" {{ old('lname') }}/>
                    </div>

                    <div class="form-group">
                      <label>Correo</label>
                      <input type="email" name="email" placeholder="Correo" class="form-control mb-2" required="" {{ old('email') }}/>
                    </div>

                    <div class="form-group">
                      <label>Teléfono</label>
                      <input type="number" name="phone" class="form-control mb-2" required="" {{ old('phone') }}/>
                    </div>


                    <div class="form-group">
                      <label>Contraseña</label>
                      <input type="password" name="pwd1" placeholder="Contraseña" class="form-control mb-2" required=""/>
                    </div>

                    <div class="form-group">
                      <label>Confirmar contraseña</label>
                      <input type="password" name="pwd2" placeholder="Contraseña" class="form-control mb-2" required=""/>
                    </div>


                    <div class="form-group">
                      <label>Imágen de perfil</label>
                      <div class="form-group image_container" style="justify-content: center;text-align: center;align-items: center;display: flex;flex-direction: column;margin: auto;">
                              <img class="profile_image_show" style="width:100px;" src="{{ asset('images/no-image.png') }}">
                            <label for="imagen_profile" style="cursor:pointer;">Seleccionar imágen</label>
                            <input style="display: none;" type="file" name="imagen" id="imagen_profile" accept="image/x-png,image/gif,image/jpeg">
                      </div>
                  </div>


                  <div class="form-group">

                    <label >Tipo de usuario</label>
                  <select class="form-control" id="user_rol" name="rol" {{ old('rol') }}>
                    <option value="Gerente">Gerente</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Subcontratista">Subcontratista</option>
                  </select>

                </div>


                <div class="form-group" id="contratista_data">

              </div>










                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
<script src="{{ asset('js/usuarios/nuevo.js') }}" defer></script>
<script src="{{ asset('js/registro.js') }}" defer></script>


