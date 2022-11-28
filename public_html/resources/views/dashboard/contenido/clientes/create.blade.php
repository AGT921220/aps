@extends('layouts.dashboard')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
          <span>Agregar Cliente</span>
          <a href="/clientes" class="btn btn-primary btn-sm">Volver a Clientes</a>
        </div>
        <div class="card-body">

          <form method="POST" action="/clientes" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Nombre (Requerido)</label>
              <input type="text" name="name" placeholder="Nombre" class="form-control mb-2" required=""
                {{ old('name') }} />
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="email" placeholder="Correo" class="form-control mb-2" 
                  {{ old('email') }} />
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input type="number" name="phone" class="form-control mb-2" 
                  {{ old('phone') }} />
              </div>
              <div class="form-group">
                <label>Calle</label>
                <input type="text" name="street" placeholder="Calle" class="form-control mb-2" 
                  {{ old('street') }} />
              </div>
              <div class="form-group">
                <label>Colonia</label>
                <input type="text" name="colony" placeholder="Colonia" class="form-control mb-2" 
                  {{ old('colony') }} />
              </div>
              <div class="form-group">
                <label>N°</label>
                <input type="text" name="no_ext" placeholder="Número" class="form-control mb-2" 
                  {{ old('no_ext') }} />
              </div>
              <div class="form-group">
                <label>N° Interior</label>
                <input type="text" name="no_int" placeholder="Número Interior" class="form-control mb-2" 
                  {{ old('no_int') }} />
              </div>
              <div class="form-group">
                <label>Código Postal</label>
                <input type="text" name="cp" placeholder="Código Postal" class="form-control mb-2" 
                  {{ old('cp') }} />
              </div>
              <div class="form-group">
                <label>Observaciones</label>
                <input type="text" name="observations" placeholder="Observaciones" class="form-control mb-2" 
                  {{ old('observations') }} />
              </div>


          


            <button class="btn btn-primary btn-block" type="submit">Agregar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
<style>
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }
  
  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: #2196F3;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }
  </style>
<script src="{{ asset('js/registro.js') }}" defer></script>