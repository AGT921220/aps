<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aps</title>


    <!-- Icons font CSS-->
    <link href="{{asset('colorlib/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('colorlib/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('colorlib/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('colorlib/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('colorlib/css/main.css')}}" rel="stylesheet" media="all">

<!--SCRIPT ANALYTICS-->
@include('dashboard.partials.analytics')


    </head>
    <body>



        <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
                @yield('content') 
        </div>
    

    <!-- Jquery JS-->
    <script src="{{asset('bower_components/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('colorlib/select2/select2.min.js')}}"></script>
    <script src="{{asset('colorlib/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('colorlib/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('colorlib/js/global.js')}}"></script>



    </body>
</html>
