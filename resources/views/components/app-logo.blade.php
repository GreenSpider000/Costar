@props(['image' => '', 'class' => ''])

@if ($image)
    <img src="{{$image}}" class="{{$class}}" style="height: 50px;" />
@else
    <img src="{{asset('images/logo.svg')}}" class="{{$class}}" style="height: 50px;" />
@endif