@extends('layouts.dashboard')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
          <span>Comprobar Facturas</span>
        </div>
        <div class="card-body">

          <form method="POST" action="/facturacion" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>XML's </label>

                <input type="file" name="xmlFiles[]" multiple class="form-control mb-2" >

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
<script src="{{ asset('js/billing/index.js') }}" defer></script>