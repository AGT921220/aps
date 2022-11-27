@extends('layouts.app_old')

@section('content')

@foreach ($categories as $item)
{{-- <img src="parent_code/{{$item->parent_code}}.jpg" alt="" style="width:100px;height:100px;"> --}}
{{-- <img alt="{{$item->img}}" src="parent_code/{{$item->parent_code}}.jpg" style="width:100px;height:100px;">  --}}
<img src="{{$item->image_url}}"  style="width:100px;height:100px;"> 

<p>PARENT CODE{{$item->parent_code}}</p>
<p>TOTAL : {{$item->total}}</p>
<hr>
<br>
@endforeach

@endsection