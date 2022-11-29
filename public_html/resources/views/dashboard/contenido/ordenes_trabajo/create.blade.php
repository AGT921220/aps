@extends('layouts.dashboard')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
          <span>Agregar Orden</span>
          <a href="/ordenes-de-trabajo" class="btn btn-primary btn-sm">Volver a Ordenes</a>
        </div>
        <div class="card-body">

          <form method="POST" action="/ordenes-de-trabajo" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Cliente</label>
              <select  id="catalogo_select" class="form-control" name="client_id">
                  @foreach($clients['data'] as $item)
                      <option value="{{$item['id']}}">{{$item['name']}}</option>
                  @endforeach
              </select>
          </div>
              <div class="form-group">
                <label>Cantidad</label>
                <input type="number" name="quantity"  class="form-control mb-2" required="" 
                  {{ old('quantity') }} />
              </div>
              <div class="form-group">
                <label>Material</label>
                <input type="text" name="material" placeholder="Material" class="form-control mb-2" required="" 
                  {{ old('material') }} />
              </div>
              <div class="form-group">
                <label>Color(es) Impresión</label>
                <input type="text" name="print_colors" placeholder="Impresión" class="form-control mb-2" required="" 
                  {{ old('print') }} />
              </div>
              <div class="form-group">
                <label>Precio Unitario</label>
                <input type="number" step="any" name="unit_price" placeholder="Precio Unitario" class="form-control mb-2" required="" 
                  {{ old('unit_price') }} />
              </div>
              <div class="form-group">
                <label>Observaciones (Opcional)</label>
                <input type="text" name="observations" placeholder="Observaciones" class="form-control mb-2"  
                  {{ old('observations') }} />
              </div>

              <div class="form-group">
                <label>Tiempo de Entrega (Opcional)</label>
                <input type="date" name="delivery_date" class="form-control mb-2"  
                  {{ old('delivery_date') }} />
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