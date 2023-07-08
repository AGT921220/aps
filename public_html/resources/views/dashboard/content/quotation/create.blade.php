@extends('layouts.dashboard')

@section('content')
    <div class="" style="padding: 3em">
        <div class=" justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                        <span>Agregar Cotización</span>
                        <a href="/clients" class="btn btn-primary btn-sm">Volver a Cotizaciones</a>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="/quotation" enctype="multipart/form-data">
                            @csrf



                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control client_id select_2" name="client_id">
                                    @foreach ($clients['data'] as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['company_name'] }} -
                                            {{ $item['person_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <h4>Agregar Producto</h4>

                            <div class="form-group" style="justify-content: center;
                            align-items: center;
                            display: flex;
                            flex-direction: column;">
                              <label>Del Catálogo</label>
                              <label class="switch">
                                <input type="checkbox" checked="true" class="check_catalog">
                                <span class="slider round"></span>
                              </label>
                              
                            </div>
                            <div class="container mb-2 col-md-12 product_catalog_container" style="margin-bottom: 2em">

                                <select class="form-control catalog_clave">
                                </select>
                            </div>

                            

                            <div class="row mt-2">
                                <div class="form-group col-md-2">
                                    <label>CLAVE</label>
                                    <input type="text" placeholder="Clave" class="form-control mb-2 clave" />
                                </div>

                                <div class="form-group col-md-2">
                                    <label>CANTIDAD</label>
                                    <input type="number" placeholder="Cantidad" class="form-control mb-2 quantity" />
                                </div>
                                <div class="form-group col-md-5">
                                    <label>DESCRIPCION</label>
                                    <input type="text" placeholder="Descripción" class="form-control mb-2 description" />
                                </div>
                                <div class="form-group col-md-1">
                                    <label>UNITARIO</label>
                                    <input type="number" step="any" placeholder="Cantidad"
                                        class="form-control mb-2 quantity" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>SUB-TOTAL</label>
                                    <input type="number" step="any" placeholder="Cantidad"
                                        class="form-control mb-2 quantity" />
                                </div>

                            </div>


                            <input type="text" class="product_id">

                            <div style="margin:1em">

                                <input type="button" class="btn btn-info form-group mb-2 add_poduct" value="Agregar">
                            </div>

                            <h3>Partidas Agregadas</h3>


                    <div class="card-body" style="overflow-x:scroll">
                        <table class="table" id="datatable" style="overflow-x:scroll">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                            <button class="btn btn-primary btn-block" type="submit">Guardar</button>
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

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
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

<script src="{{ asset('js/datatables.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">



<script src="{{ asset('js/registro.js') }}" defer></script>
<script src="{{ asset('js/quotation/create.js') }}" defer></script>
