<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aps</title>


    <!-- Icons font CSS-->
    <link href="{{asset('colorlib/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('colorlib/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">

      <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="{{asset('css/principal.css')}}" rel="stylesheet" media="all">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!--SCRIPT ANALYTICS-->
@include('dashboard.partials.analytics')


    </head>
    <body>


        <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                @yield('content') 
        </div>
    

    <!-- Jquery JS-->
    <script src="{{asset('bower_components/jquery/jquery.min.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    {{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
    <script src="https://www.google.com/recaptcha/api.js?render=6LcD3YAaAAAAAI-ZlZjLwc0DjHpuPW1-o9GGGcLh"></script>

    {{-- <!-- Main JS-->
    <script src="{{asset('colorlib/js/global.js')}}"></script> --}}



    </body>
</html>
