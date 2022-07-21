@if(auth()->user())

<script type="text/javascript">
    window.location = "/dashboard/agregar_citas";//here double curly bracket
</script>
@endif

<style>

    .alert-danger{
        color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
    padding: 15px;
    border-radius: 10px;
    }
</style>

@extends('layouts.app')

@section('content')

<div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">

                @if ( session('success') )
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @elseif(session('mensaje'))
                <div class="alert alert-warning">{{ session('mensaje') }}</div>
            @endif

                <h2 class="title">Login</h2>

                <form method="POST" action="{{ route('login_web') }}">
                        @csrf


                    <div class="input-group">
                        <input class="input--style-1" type="number" placeholder="Celular" name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>

                        @error('celular')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror

                    </div>


                    <div class="input-group">
                        <input class="input--style-1" type="password" placeholder="Contraseña" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror

                    </div>


                    <div style="display: flex;justify-content: space-between;" class="p-t-20">
                        <button class="btn btn--radius btn--green" type="submit">Entrar</button>

                    </div>


                </form>
            </div>


            <div class="card-body">
                <h2 class="title">Crear cuenta</h2>

                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf


                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="Nombre Completo" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror

                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="number" placeholder="Celular" name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>

                        @error('celular')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="password" placeholder="Contraseña" name="password" value="{{ old('password') }}" required  autofocus>

                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="input-group">
                        <input class="input--style-1" type="password" placeholder="Confirmar contraseña" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>

                        @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>



                    <div style="display: flex;justify-content: space-between;" class="p-t-20">
                        <button class="btn btn--radius btn--green" type="submit">Registrar</button>
                        <!--<a class="btn btn--radius btn--green" style="text-decoration: none;" href="login">Iniciar Sesión</a>-->
                    </div>


                </form>
            </div>


        </div>




    </div>



@endsection
<script src="{{ asset('js/registro.js') }}" defer></script>



