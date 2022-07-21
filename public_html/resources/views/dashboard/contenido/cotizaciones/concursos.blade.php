@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista de Proyectos</span>
                </div>

                <div class="card-body" style="overflow-x:scroll">
                    <table class="table" id="datatable" style="overflow-x:scroll">
                        <thead>
                            <tr>
                            <th>Proyecto</th>
                            <th >Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyectos as $item)
                            <tr>
                                <td>{{ $item->name }}</td>

                                <td class="actions_table">
                                    {!! $item->actions!!}
                                </td>


                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th >Proyecto</th>
                                <th >Acciones</th>
                            </tr>
                        </tfoot>

                    </table>

                {{-- fin card body --}}
                </div>

                <a href="{{ route('agregar_proyecto') }}"class="btn btn-primary btn-sm">Nuevo Proyecto</a>
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
        display: flex !important;
        justify-content: space-evenly;
    }
    .actions_table form{
        display: contents;
        margin: 1em auto;
    }
    </style>


<script src="{{ asset('js/datatables.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/datatables.css') }}">