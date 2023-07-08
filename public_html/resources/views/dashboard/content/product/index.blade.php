@extends('layouts.dashboard')

@section('content')
    <div class="">
        <div class="">
            <div class="col-md-12">
                <div class="">
                    <div class="card-header">
                        <span>Clientes</span>
                    </div>



                    <div class="datatable_api_container" style="display: none">
                        <hr>
                    
                    <h4 class="title"></h4>
                    
                    <table class="table" id="datatable_api" style="overflow-x:scroll;" >
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Proveedor</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                            {{-- @foreach ($itemsApi as $item)
                                <tr>
                                    <td> {{ $item->id }}</td>
                                    <td> {{ $item->name }}</td>
                                    <td> {{ $item->rfc }}</td>
                                    <td> {{ $item->seller }}</td>
                                    <td class="actions_table">
                                        <a href="/prospectos/{{ $item->id }}/perfiles"
                                            class="btn btn-primary">Perfiles</a>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Proveedor</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    </div>
                    

                </div>
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
