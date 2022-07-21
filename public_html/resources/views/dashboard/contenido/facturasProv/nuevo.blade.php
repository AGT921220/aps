@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Factura</span>
                    <a href="{{ route('ver_facturasProv') }}" class="btn btn-primary btn-sm">Volver a la lista...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('guardar_facturaProv') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                      <label>Proveedor</label>
                        <select name="proveedor" id="proveedor" class="form-control">
                          @foreach($proveedores as $item)
                            <option value="{{$item->id}}">{{$item->company}}</option>
                          @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                      <label>Monto</label>
                      <input type="number" step="any" name="monto"  class="form-control mb-2 monto" required="" {{ old('monto') }}/>
                    </div>

                    <div class="form-group">
                      <label>IVA</label>
                      <input type="number" step="any" name="iva" disabled=""  class="form-control mb-2 iva" required="" {{ old('iva') }}/>
                    </div>


                    <div class="form-group">
                      <label>Total</label>
                      <input type="number" step="any" name="total" disabled=""  class="form-control mb-2 total" required="" {{ old('iva') }}/>
                    </div>



                    <div class="form-group">
                      <label>Mes</label>
                        <select name="month" id="month" class="form-control">
                          <option value="Enero">Enero</option>
                          <option value="Febrero">Febrero</option>
                          <option value="Marzo">Marzo</option>                                                  
                          <option value="Abril">Abril</option>                                                    
                          <option value="Mayo">Mayo</option>
                          <option value="Junio">Junio</option>
                          <option value="Julio">Julio</option>
                          <option value="Agosto">Agosto</option>
                          <option value="Septiembre">Septiembre</option>
                          <option value="Octubre">Octubre</option>
                          <option value="Noviembre">Noviembre</option>
                          <option value="Diciembre">Diciembre</option>
                        </select>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/facturas/agregar.js') }}" defer></script>
@endsection
