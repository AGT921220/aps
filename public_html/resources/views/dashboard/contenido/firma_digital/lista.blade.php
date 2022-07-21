@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>Lista de Firmas</span>
                </div>

                <div class="card-body" style="overflow-x:scroll">      
                    <table class="table" style="overflow-x:scroll">
                        <thead>
                            <tr>
                            <th scope="col">Usuario</th> 
                            <th scope="col">Extension</th>                            
                            <th scope="col">Firma</th>                                                           
                            <th scope="col">Acciones</th>                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($firmas as $item)
                            <tr>
                                <td>{{ $item->name }}</td>  
                                <td>{{ $item->extension }}</td> 
                                <td>
                                    <img style="width:50px; height:50px" src="{{ asset($item->firma) }}">
                                </td>                     
                                <td>
                                    EDITAR/ELIMINAR
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                {{-- fin card body --}}
                </div>

                <a href="{{ route('firma_digital_new') }}" class="btn btn-primary btn-sm">Nueva Firma</a>
            </div>
        </div>
    </div>
</div>
@endsection
