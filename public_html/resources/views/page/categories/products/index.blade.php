
@if ($products->count())
<div style="    display: flex;
justify-content: space-around;
flex-wrap: wrap;">
@foreach ($products as $item)
    <div>
        <img style="    width: 300px;
        height: 300px;" src="{{$item->img}}" alt="">
    </div>
@endforeach    
@endif
</div>
