@extends('layouts.dashboard')

@section('content')
    <div class="">
        <div class="">
            <div class="col-md-12">
                <div class="">
                    <div class="card-header">
                        <span>Clientes</span>
                    </div>

                    <div class="card-body" style="overflow-x:scroll">
                        <table class="table" id="datatable" style="overflow-x:scroll">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Familia</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Imágen(es)</th>
                                    <th scope="col">Existencias</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <td> {{ $product['name'] }}</td>
                                        <td> {{ $product['provider'] }}</td>
                                        <td> {{ $product['item_code'] }}</td>
                                        <td> {{ $product['description'] }}</td>
                                        <td> {{ $product['family'] }}</td>
                                        <td> {{ $product['material'] }}</td>
                                        <td>                                            
                                            @foreach ($product['images_format'] as $image)
                                            <img src="{{ $image }}"  style="width:100px;">
                                            @endforeach
                                        </td>
                                        <td> {{ $product['stock'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Familia</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Imágen(es)</th>
                                    <th scope="col">Existencias</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>



  

                    {{-- <div class="d-flex">
                        <a href="/clients/create" class="btn btn-primary btn-sm">Nuevo Cliente</a>
                    </div> --}}

                </div>
                {{-- <div class="perfiles_table">
                     @include('dashboard.items.datatable_api') 
                </div> --}}
            </div>
        </div>

    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endsection
<style>
    .switchShow {
        display: none;
    }

    tbody tr td,
    thead tr th {
        text-align: center;
    }

    .actions_table {
        justify-content: space-evenly;
    }

    .actions_table form {
        display: contents;
        margin: 1em auto;
    }

    .print_modal {
        background-color: #ffffff;
        width: 95vw;
        overflow-y: scroll;
        position: fixed;
        height: 75vh;
        top: 0;
        bottom: 0;
        z-index: 10000;
        margin: auto;
        left: 0;
        right: 0;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        width: 100vw;
        height: 100vh;
    }

    .close_modal {
        margin-right: 0;
        margin-top: 0;
        position: absolute;
        top: 1em;
        z-index: 1000000000;
        right: 2em;
        cursor: pointer;
        font-size: 1.5em;
    }

    /* .print_modal_item {
        text-align: center;
        min-height: 400px;
    } */
</style>

<script src="{{ asset('js/datatables.js') }}" defer></script>
<script src="{{ asset('js/datatables_api.js') }}" defer></script>

<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
