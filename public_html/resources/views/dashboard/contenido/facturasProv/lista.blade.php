@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista de Facturas</span>
                </div>

                <div class="card-body" style="overflow-x:scroll">
                    <table class="table" id="datatable" style="overflow-x:scroll">
                        <thead>
                            <tr>

                            <th scope="col">Proveedor</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Iva</th>
                            <th scope="col">Total</th>
                            <th scope="col">Mes</th>
                            <th scope="col">Fecha</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturas as $item)
                            <tr>
                                <td>{{ $item->proveedor }}</td>
                                <td>${{ $item->monto }}</td>
                                <td>${{ $item->iva }}</td>
                                <td>${{ $item->total }}</td>
                                <td>{{ $item->month }}</td>
                                <td>{{ substr($item->created_at,0,10) }}</td>

                        </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Iva</th>
                                <th scope="col">Total</th>
                                <th scope="col">Mes</th>
                                <th scope="col">Fecha</th>
    
                            </tr>
                        </tfoot>
                    </table>

                    <h3>Totales</h3>

                        <table class="table" style="overflow-x:scroll">
                            <thead>
                                <tr>
                                <th scope="col">Monto</th>
                                <th scope="col">Iva</th>
                                <th scope="col">Total</th>   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${{ $totalMonto }}</td>
                                    <td>${{ $totalIva }}</td>
                                    <td>${{ $totalTotal }}</td>
                               </tr>

                            </tbody>
                         </table>
                </div>



        </div>


                <a href="{{ route('agregar_factura') }}" class="btn btn-primary btn-sm">Nueva Factura</a>
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