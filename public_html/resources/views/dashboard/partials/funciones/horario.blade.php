<div class="card-body" style="overflow-x:scroll">
    <label>Horario</label>
      <table class="table" style="overflow-x:scroll">
        <thead>
            <tr>
            <th scope="col">Dia</th>
            <th scope="col">Entrada</th>
            <th scope="col">Salida a Comer</th>
            <th scope="col">Entrada Comer</th>
            <th scope="col">Salida</th>
            </tr>
        </thead>
        <tbody>


                @php
                    $dias = [['lun','Lunes'],
                    ['mar','Martes'],
                    ['mier','Miercoles'],
                    ['jue','Jueves'],
                    ['vie','Viernes'],
                    ['sab','Sabado'],
                    ['dom','Domingo']]
                @endphp


                @foreach ($dias as $dia)

                            @php
                                $entrada = $dia[0].'_entrada';
                                $salida_c = $dia[0].'_salida_comida';
                                $entrada_c = $dia[0].'_entrada_comida';
                                $salida = $dia[0].'_salida';
                            @endphp
                            <tr>

                            <th scope="col" style="text-align:center">{{$dia[1]}}</th>

                            <th scope="col" style="text-align:center">
                                <select class="form-control" style="    min-width: 110px;" name="{{$dia[0]}}_entrada" >
                                <option value="0">SIN HORARIO</option>
                                    @for ($i =8; $i <= 20; $i++)
                                    <option value="{{ $i }}"
                                        @if(isset($horarios->$entrada) &&$horarios->$entrada==$i) selected=""  @endif>
                                        @if($i<=12)
                                        {{$i}} AM
                                        @else
                                        {{substr($i - 2, 1, 2) }} PM
                                        @endif
                                    </option>
                                @endfor
                                </select>
                            </th>

                            <th scope="col" style="text-align:center">
                                <select class="form-control" style="    min-width: 110px;" name="{{$dia[0]}}_salida_comida" >
                                <option value="0">SIN HORARIO</option>
                                    @for ($i =8; $i <= 20; $i++)
                                    <option value="{{ $i }}"
                                        @if(isset($horarios->$salida_c) &&$horarios->$salida_c==$i) selected=""  @endif>
                                        @if($i<=12)
                                        {{$i}} AM
                                        @else
                                        {{substr($i - 2, 1, 2) }} PM
                                        @endif
                                    </option>
                                @endfor
                                </select>
                            </th>

                            <th scope="col" style="text-align:center">

                            <select class="form-control" style="    min-width: 110px;"  name="{{$dia[0]}}_entrada_comida" >
                                <option value="0">SIN HORARIO</option>
                                    @for ($i =8; $i <= 20; $i++)
                                    <option value="{{ $i }}"
                                        @if(isset($horarios->$entrada_c) &&$horarios->$entrada_c==$i) selected=""  @endif>
                                        @if($i<=12)
                                        {{$i}} AM
                                        @else
                                        {{substr($i - 2, 1, 2) }} PM
                                        @endif
                                    </option>
                                @endfor
                                </select>
                            </th>

                            <th scope="col" style="text-align:center">

                            <select class="form-control" style="    min-width: 110px;" name="{{$dia[0]}}_salida" >
                                <option value="0">SIN HORARIO</option>
                                    @for ($i =8; $i <= 20; $i++)
                                    <option value="{{ $i }}"
                                        @if(isset($horarios->$salida) &&$horarios->$salida==$i) selected=""  @endif>
                                        @if($i<=12)
                                        {{$i}} AM
                                        @else
                                        {{substr($i - 2, 1, 2) }} PM
                                        @endif
                                    </option>
                                @endfor
                                </select>
                            </th>

                @endforeach


            </tr>
        </tbody>
    </table>
</div>
