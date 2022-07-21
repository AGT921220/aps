@if(auth()->user())

<script type="text/javascript">
    window.location = "/dashboard";//here double curly bracket
</script>
@endif

<style>
    .test{
        
    }
    .alert-danger{
        color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
    padding: 15px;
    border-radius: 10px;
    }
</style>

@extends('layouts.login')

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

         
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group" style="display: flex;margin:auto;width:70%">

                    <input style="outline: none;" class="input--style-1" type="email" placeholder="Correo" name="email" value="" required="" autocomplete="email" autofocus="">                    
                </div>
                <br><br>
                <div class="input-group" style="display: flex;margin:auto;width:70%">

                    <input style="outline: none;" class="input--style-1" type="password" placeholder="Contraseña" name="password" value="" required="" autocomplete="password" autofocus="">                    
                </div>                


                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
     
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4" style="margin: auto;">
                        <button type="submit" class="btn btn--radius btn--green" style="margin: 1em auto;
                        display: flex;background: #847e82;">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
   

        </div>




    </div>



@endsection
<script src="{{ asset('js/registro.js') }}" defer></script>



