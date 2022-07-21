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
                    <form method="POST" action="{{ route('inicio_editar_titulo') }}" enctype="multipart/form-data">
                        @csrf
                
                <label>Título</label>
                <div class="form-group" style="display: flex;">

                     @if($titulo)                
                        <input type="text" name="name" value="{{$titulo->name}}"  class="form-control mb-2 title" required="" {{ old('name') }}/>
                        <input type="hidden" name="id" value="{{$titulo->id}}" />
                
                        @if($titulo->status=='Visible')
                        <a  href="{{ route('desactivar_inicio_titulo', $titulo->id) }}" class="btn btn-warning">Desactivar</a>
                        @else
                        <a  href="{{ route('activar_inicio_titulo', $titulo->id) }}" class="btn btn-success">Activar</a>
                        @endif
                
                    @else 
                    <input type="text" name="name"  class="form-control mb-2 title" required="" {{ old('name') }}/>
                    @endif                
                
                </div>

                
                <label>Título 2</label>
                <div class="form-group" style="display: flex;">

                     @if($titulo)                
                        <input type="text" name="name2" value="{{$titulo->name2}}"  class="form-control mb-2 title2" required="" {{ old('name2') }}/>
                
                        @if($titulo->status2=='Visible')
                        <a  href="{{ route('desactivar_inicio_titulo2', $titulo->id) }}" class="btn btn-warning">Desactivar</a>
                        @else
                        <a  href="{{ route('activar_inicio_titulo2', $titulo->id) }}" class="btn btn-success">Activar</a>
                        @endif
                
                    @else 
                    <input type="text" name="name2"  class="form-control mb-2 title2" required="" {{ old('name2') }}/>
                    @endif                
                
                </div>


                                
                <label>Título 3</label>
                <div class="form-group" style="display: flex;">

                     @if($titulo)                
                        <input type="text" name="name3" value="{{$titulo->name3}}"  class="form-control mb-2 title2" required="" {{ old('name3') }}/>
                
                        @if($titulo->status3=='Visible')
                        <a  href="{{ route('desactivar_inicio_titulo3', $titulo->id) }}" class="btn btn-warning">Desactivar</a>
                        @else
                        <a  href="{{ route('activar_inicio_titulo3', $titulo->id) }}" class="btn btn-success">Activar</a>
                        @endif
                
                    @else 
                    <input type="text" name="name3"  class="form-control mb-2 title2" required="" {{ old('name2') }}/>
                    @endif                
                
                </div>




                
                <button class="btn btn-primary btn-block" type="submit"> {{($titulo) ? 'Agregar Título Nuevo':'Editar Titulo' }} </button>
                </form>
                </div>
                

                


            </div>
        </div>
    </div>
</div>


@endsection
