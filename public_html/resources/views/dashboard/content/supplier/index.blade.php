@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Proveedores</span>
                    </div>

                    <div class="card-body" style="overflow-x:scroll">
                        <table class="table" id="datatable" style="overflow-x:scroll">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono(s)</th>
                                    <th scope="col">Correo(s)</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td> {{ $supplier->id }}</td>
                                        <td> {{ $supplier->company_name }}</td>
                                        <td> {{ $supplier->person_name }}</td>
                                        <td> {{ $supplier->phone }} {{ $supplier->second_phone }}</td>
                                        <td> {{ $supplier->email }} {{ $supplier->second_email }}</td>
                                        <td class="actions_table">
                                            {{-- <a class="btn btn-info" href="/suppliers/{{$supplier->id}}">Ver</a> --}}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono(s)</th>
                                    <th scope="col">Correo(s)</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>



  

                    <div class="d-flex">
                        <a href="/suppliers/create" class="btn btn-primary btn-sm">Nuevo Proveedor</a>
                    </div>

                </div>
                {{-- <div class="perfiles_table">
                     @include('dashboard.items.datatable_api') 
                </div> --}}
            </div>
        </div>

    </div>

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

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
    integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="{{ asset('js/datatables.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">

