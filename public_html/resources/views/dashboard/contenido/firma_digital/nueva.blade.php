@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Firma Digital</span>
                    <a href="{{ route('firma_digital') }}" class="btn btn-primary btn-sm">Volver a lista de firmas...</a>
                </div>
                <div class="card-body">     
                  
                  <form method="POST" action="{{ route('guardar_firma_digital') }}" enctype="multipart/form-data">
                    @csrf

                <div class="firma_container" style="margin: 2em auto; display:flex; justify-content: center;">
                    <canvas  id="canvas"  height="150" class="canvas"></canvas>
                </div>

                <input type="hidden" class="firma_digital_value" name="firma_digital">

                <div class="form-group">
                        <label >Tipo de archivo</label>
                        <select class="form-control" name="extension">
                          <option value="png">PNG</option>
                          <option value="jpg">JPG</option>
                        </select>
                      </div>

                    <button style="display:flex; margin:2em auto;" class="clearSign btn btn-warning">Limpiar Firma</button>
 
                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.7.0/fabric.min.js"></script>
<script src="{{ asset('js/firma_digital.js') }}" defer></script>


