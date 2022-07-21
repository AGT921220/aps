@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h3>Exportar datos a Archivo de Excel</h3>

    <a href="{{ route('exportar_users_excel') }}" class="btn btn-success">Exportar Usuarios</a>
    <a href="{{ route('exportar_products_excel') }}" class="btn btn-success">Exportar Productos</a>

</div>
@endsection
