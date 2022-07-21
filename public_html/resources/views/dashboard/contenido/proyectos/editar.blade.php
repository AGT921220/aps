@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Editar Proyecto {{$proyecto->name}}</span>
                    <a href="{{ route('ver_proyectos') }}" class="btn btn-primary btn-sm">Volver a lista de proyectos...</a>
                </div>
                <div class="card-body">

                  <form method="POST" action="{{ route('editar.guardar_proyecto') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


        
                    <div class="form-group">
                        <label>Nombre del proyecto</label>
                        <input type="text" name="name" value="{{$proyecto->name}}" placeholder="Nombre" class="form-control mb-2" required="" {{ old('name') }}/>
                      </div>
  
  
                      <div class="form-group">
                          <label>Dirección del proyecto</label>
                          <input type="text" name="adress" value="{{$proyecto->adress}}" placeholder="Dirección" class="form-control mb-2" required="" {{ old('adress') }}/>
                      </div>
                      <div class="form-group">
                          <label>Presupuesto</label>
                          <input type="number" style="any" name="presupuesto" value="{{$proyecto->presupuesto}}" class="form-control mb-2" required="" {{ old('presupuesto') }}/>
                      </div>
  
                      <div class="form-group">
                          <label>Metros</label>
                          <input type="number" style="any" name="metros" value="{{$proyecto->metros}}" class="form-control mb-2" required="" {{ old('metros') }}/>
                      </div>
                        
                      <div class="form-group">
                          <label>Empleados</label>
                          <input type="number"  name="emplooyes" value="{{$proyecto->emplooyes}}" class="form-control mb-2" required="" {{ old('emplooyes') }}/>
                      </div>
        
                      <div class="form-group">
                          <label>Nombre y cargo del Staff</label>
                          <input type="text"  name="staff" value="{{$proyecto->staff}}" class="form-control mb-2" required="" {{ old('staff') }}/>
                      </div>
  

                <input type="hidden" value="{{$proyecto->id}}" name="id">

                    <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


<script src="{{ asset('js/registro.js') }}" defer></script>
