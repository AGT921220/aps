@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Lista de Productos</span>
                    </div>


                    <a class="btn btn-primary sync_promo_products" href="/sync/products">Sincronizar Productos</a>
                    <a class="btn btn-primary sync_promo_products_exists" href="/sync/products-existences">Sincronizar Existencias</a>
                    <div class="card-body" style="overflow-x:scroll">
                        <table class="table" id="datatable" style="overflow-x:scroll">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Padre</th>
                                    <th scope="col">Familia</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Colores</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Impresión</th>
                                    <th scope="col">Area Impresión</th>
                                    <th scope="col">Existencias</th>
                                    <th scope="col">Imágen</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->item_code}}</td>
                                        <td>{{$item->parent_code}}</td>
                                        <td>{{$item->family}}</td>
                                        <td>{{$item->color}}</td>
                                        <td>{{$item->colors}}</td>
                                        <td>{{$item->material}}</td>
                                        <td>{{$item->printing}}</td>
                                        <td>{{$item->printing_area}}</td>
                                        <td>{{$item->stock}}</td>
                                        <td>
                                            <img style="width:50px; height:50px" src="{{ asset($item->img) }}">
                                            {{$item->img}}
                                        </td>
        
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Padre</th>
                                    <th scope="col">Familia</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Colores</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Impresión</th>
                                    <th scope="col">Area Impresión</th>
                                    <th scope="col">Existencias</th>
                                    <th scope="col">Imágen</th>
                                </tr>
                            </tfoot>
                        </table>

                        {{-- fin card body --}}
                    </div>

                    <a href="/dashboard/clientes/create" class="btn btn-primary btn-sm">Nuevo Cliente</a>
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
</style>

<script src="{{ asset('js/datatables.js') }}" defer></script>
<script src="{{ asset('js/sync/index.js') }}" defer></script>

<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
