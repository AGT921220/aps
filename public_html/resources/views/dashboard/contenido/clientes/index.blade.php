@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Clientes</span>
                    </div>

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

                                @foreach ($items['data'] as $item)
                                    <tr>

                                        <td> {{ $item['id'] }}</td>
                                        <td> {{ $item['name'] }}</td>
                                        <td> {{ $item['phone'] }}</td>
                                        <td> {{ $item['email'] }}</td>
                                        <td class="actions_table">
                                            <a class="btn btn-info" href="/clientes/{{$item['id']}}">Ver</a>
                                            {{-- <a 
                                            data-id="{{$item->id}}"
                                            {{-- href="/clientes/{{ $item->id }}/perfiles" --}}
                                                {{-- class="btn btn-primary show_datatable_profiles">Perfiles</a> --}} 

                                            {{-- <a href="/clientes/{{ $item->id }}/edit"
                                                class="btn btn-warning">Editar</a>

                                            <form action="/clientes/{{ $item->id }}" class="d-inline"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form> --}}
                                        </td>

                                    </tr>
                                @endforeach
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



  

                    <div class="d-flex">
                        <a href="/clientes/create" class="btn btn-primary btn-sm">Nuevo Cliente</a>
                    </div>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
    integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/datatables.js') }}" defer></script>
{{-- <script src="{{ asset('js/datatables_api.js') }}" defer></script> --}}

<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">

