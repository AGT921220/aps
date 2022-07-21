@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista de Imágenes de Carousel de Inicio</span>
                </div>

                <div class="card-body" style="overflow-x:scroll">
                    <table class="table" id="datatable" style="overflow-x:scroll">
                        <thead>
                            <tr>

                            <th scope="col">Imágen</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carousels as $item)
                            <tr>
                                <td>
                                    <img style="width:50px; height:50px" src="{{ asset($item->imagen) }}">
                                </td>

                                <td>{{ ($item->status=='Visible') ? 'Visible':'No visible' }}</td>

                                

                                <td>
                                    @if($item->status=='Visible')
                                    <a  href="{{ route('desactivar_carousel', $item->id) }}" class="btn btn-warning">Desactivar</a>
                                    @else
                                    <a  href="{{ route('activar_carousel', $item->id) }}" class="btn btn-success">Activar</a>
                                    @endif

                                
                                </td>

                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>

                                <th scope="col">Imágen</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Acciones</th>

                                </tr>
                        </tfoot>
                    </table>

                 

        </div>


                <a href="{{ route('agregar_carousel') }}" class="btn btn-primary btn-sm">Nueva imagen de Carousel</a>
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