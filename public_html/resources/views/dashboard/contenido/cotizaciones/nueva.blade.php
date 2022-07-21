@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-2" style="    display: flex;justify-content: space-between;">
                    <span>Agregar Cita</span>
                    <a href="{{ route('ver_citas') }}" class="btn btn-primary btn-sm">Volver a lista de citas...</a>
                </div>
                <div class="card-body">







                    <div class="form-group servicio_select_clone" style="display: none">
                        <label >Servicio</label>
                        @php
                        $categoria_option = $servicios[0]->categoria;
                        @endphp
                        <select class="form-control servicio_item" name="servicio" >
                            <optgroup label="{{$categoria_option}}">
                                @foreach ($servicios as $item)
                                    @if($categoria_option!=$item->categoria)
                                        @php
                                            $categoria_option=$item->categoria;
                                        @endphp
                                        </optgroup>
                                        <optgroup label="{{$categoria_option}}">
                                    @endif
                                    <option class="servicio" value="{{$item->id}}">  {{$item->servicio}}</option>
                                    @endforeach
                            </optgroup>
                        </select>
                        <div class="img_servicio"></div>
                    </div>



                <div class="servicios">

                    <div class="form-group servicio_select">
                        <label >Servicio</label>
                        @php
                        $categoria_option = $servicios[0]->categoria;
                        @endphp
                        <select class="form-control servicio_item servicio_item_principal" name="servicio" >
                            <optgroup label="{{$categoria_option}}">
                                @foreach ($servicios as $item)
                                    @if($categoria_option!=$item->categoria)
                                        @php
                                            $categoria_option=$item->categoria;
                                        @endphp
                                        </optgroup>
                                        <optgroup label="{{$categoria_option}}">
                                    @endif
                                    <option class="servicio" value="{{$item->id}}">  {{$item->servicio}}</option>
                                    @endforeach
                            </optgroup>
                        </select>
                        <div class="img_servicio"></div>
                    </div>

                </div>


                    <div class="form-group">
                        <a class="btn btn-info add_servicio">Agregar Servicio Extra</a>
                    </div>


                    <div class="form-group" style="display: flex;     margin: auto; justify-content:center;">
                        <div style="display: flex; flex-direction:column;">
                          <label style="margin: auto">Duración</label>
                          <input style="width:90%" type="text"  disabled  class="form-control mb-2 duracion" required=""  />
                          <input type="hidden" name="duracion_horas"   class="form-control mb-2 duracion_horas" required=""  />
                          <input type="hidden" name="duracion_minutos"   class="form-control mb-2 duracion_minutos" required=""  />
                      </div>
                      <div style="display: flex; flex-direction:column;">
                          <label style="margin: auto">Precio</label>
                          <input style="width:90%" type="text"  disabled  class="form-control mb-2 precio" required=""  />
                          <input type="hidden" name="precio"   class="form-control mb-2 precio_input" required=""  />
                      </div>
                      </div>


                    <div class="form-group servicio_select">
                        <label >Estilista</label>
                        <select class="form-control estilista" name="estilista" >

                        @foreach ($estilistas as $item)
                        <option class="servicio" value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>




                    <div class="form-group">
                        <label >Fecha</label>
                    <input type="date" name="fecha" placeholder="Fecha" value="{{date("Y-m-d")}}" class="form-control mb-2 cita_fecha" required="" {{ old('fecha') }}/>
                    </div>

<div class="form-group citas_disponibles">
</div>


                </div>
            </div>
        </div>
    </div>
</div>



@endsection


<style>
.citas_disponibles{
    margin: 1em 2em;
}
.hora_disponible{
margin:1em 0.5em;
}
.hora_disponible{
    min-width: 100px;
}
.img_servicio{
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
</style>


<input type="hidden" id="csrf_token" value="{{ csrf_token() }}">


<link href="{{asset('css/calendario.css') }}" rel='stylesheet' />
<script src="{{ asset('js/calendario.js') }}" defer></script>

<link href="{{asset('fullcalendar/core/main.css') }}" rel='stylesheet' />
<link href="{{asset('fullcalendar/daygrid/main.css') }}" rel='stylesheet' />
<link href="{{asset('fullcalendar/timegrid/main.css') }}" rel='stylesheet' />
<link href="{{asset('fullcalendar/list/main.css') }}" rel='stylesheet' />
<script src="{{asset('fullcalendar/core/main.js') }}"></script>
<script src="{{asset('fullcalendar/interaction/main.js') }}"></script>
<script src="{{asset('fullcalendar/daygrid/main.js') }}"></script>
<script src="{{asset('fullcalendar/timegrid/main.js') }}"></script>
<script src="{{asset('fullcalendar/list/main.js') }}"></script>



<script src="{{asset('fullcalendar/core\locales/es.js') }}"></script>


