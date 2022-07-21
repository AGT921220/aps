@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista de Usuarios</span>
                </div>

                <div class="card-body" style="overflow-x:scroll">
                    <table class="table" id="datatable" style="overflow-x:scroll">
                        <thead>
                            <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Tipo de usuario</th>
                            <th>Foto</th>
                            <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->lname }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->rol }}</td>
                                <td>
                                    <img style="width:50px; height:50px" src="{{ asset($item->imagen) }}">
                                </td>
                                    <td class="actions_table">
                                        <a  href="{{ route('editar_usuario', $item->id) }}" class="btn btn-primary">Editar</a>

                                        <form action="{{ route('eliminar_usuario', $item->id) }}" class="d-inline" method="POST">
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
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Teléfono</th>
                                <th>Tipo de usuario</th>
                                <th>Foto</th>
                                <th>Accion</th>
                            </tr>
                        </tfoot>

                    </table>

                {{-- fin card body --}}
                </div>

                <a href="{{ route('agregar_usuario') }}"class="btn btn-primary btn-sm">Nuevo Usuario</a>
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