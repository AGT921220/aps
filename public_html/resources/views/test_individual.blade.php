@extends('layouts.app_old')

@section('content')

@foreach ($categories as $item)
<div>
<img src="{{$item->img}}" alt="" style="width:100px;height:100px;">
<p>PARENT CODE : {{$item->parent_code}}</p>
{{-- <img src="https://www.contenidopromo.com/Images/Items/{{$item->parent_code}}.jpg" alt="parent_code/{{$item->parent_code}}.jpg" style="width:100px;height:100px;"> --}}
<img alt="https://www.contenidopromo.com/Images/Items/{{$item->parent_code}}.jpg" src="parent_code/{{$item->parent_code}}.jpg" style="width:100px;height:100px;">


</div>
<hr>
<br>
@endforeach

@endsection