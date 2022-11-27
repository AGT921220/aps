@extends("layouts.app")


        @section("metas")
        
        <meta name="META" content="EJEMPLO DE ETIQUETA META">
        
        @endsection
        
        @section("content")
        @include("page.categories.products.index")
        @endsection