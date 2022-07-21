@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista de Proveedores</span>
                </div>

                <div class="card-body" style="overflow-x:scroll">
                    <table class="table" id="datatable" style="overflow-x:scroll">
                        <thead>
                            <tr>
                            <th scope="col">Empresa</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $item)
                            <tr>
                                <td>{{ $item->company }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->lname }}</td>
                                <td class="actions_table">
                                    <a  href="{{ route('editar_proveedor', $item->id) }}" class="btn btn-primary">Editar</a>

                                    <form action="{{ route('eliminar_proveedor', $item->id) }}" class="d-inline" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">Empresa</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>

                {{-- fin card body --}}
                </div>

                <a href="{{ route('agregar_proveedor') }}" class="btn btn-primary btn-sm">Nuevo Proveedor</a>
            </div>
        </div>
    </div>
</div>



<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

@endsection
<style>
    tbody tr td,thead tr th{
        text-align: center;
    }
    .actions_table{
        justify-content: space-evenly;
    }
    .actions_table form{
        display: contents;
        margin: 1em auto;
    }
    </style>
<script src="{{ asset('js/datatables.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">