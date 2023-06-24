@extends('layouts.dashboard')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
          <span>Agregar Proveedor</span>
          <a href="/suppliers" class="btn btn-primary btn-sm">Volver a Proveedores</a>
        </div>
        <div class="card-body">

          <form method="POST" action="/suppliers" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Empresa</label>
              <input type="text" name="company_name" placeholder="Empresa" class="form-control mb-2" required=""
                {{ old('company_name') }} />
            </div>
            <div class="form-group">
                <label>Contacto</label>
                <input type="text" name="person_name" placeholder="Contacto" class="form-control mb-2" 
                  {{ old('person_name') }} />
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="phone" placeholder="Telefono" class="form-control mb-2" 
                  {{ old('phone') }} />
              </div>
              <div class="form-group">
                <label>Segundo Teléfono (Opcional)</label>
                <input type="text" name="second_phone" placeholder="Telefono 2" class="form-control mb-2" 
                  {{ old('second_phone') }} />
              </div>
              <div class="form-group">
                <label>Correo</label>
                <input type="email" name="email" placeholder="Correo" class="form-control mb-2" 
                  {{ old('email') }} />
              </div>
              <div class="form-group">
                <label>Segundo Correo(Opcional)</label>
                <input type="email" name="second_email" placeholder="Segundo Correo" class="form-control mb-2" 
                  {{ old('second_email') }} />
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