@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header cita_detail">
                    <h2>Detalle de la cita</h2>

                </div>

                <div class="card-body">
                    <div class="form-group cita_detail">
                        <label>Servicios</label>
                        @foreach ($servicios as $item)
                        <p>{{$item->servicio}}(${{$item->precio}})</p>
                        @endforeach
                    </div>
                    <div class="form-group cita_detail">
                        <label>Estilista</label>
                        <p>{{$cita->estilista}}</p>
                    </div>
                    <div class="form-group cita_detail">
                        <label>Tiempo estimado</label>
                        <p>{{$cita->duracion}}</p>
                        <p>De {{substr($cita->fecha,10,12) }}</p>
                        <p>A {{substr($cita->fin,10,12) }}</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
        <a href="{{ route('ver_citas') }}" class="btn btn-primary btn-sm btn_lista_citas">Volver a lista de citas...</a>
    </div>
</div>
@endsection
<style>
.cita_detail{
    text-align: center;
}
.btn_lista_citas{
    display: flex !important;
    justify-content: center !important;
}
</style>
