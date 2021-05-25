@extends('layouts.master')

@section('content')
<div>
    <h1>{{$product->name}}</h1>

    @if(!empty($product->picture))
    <img src="{{asset('images/'.$product->picture->link)}}" alt="picture of article">
    @endif

    {{$product->description}}
    <div>
        {{$product->price}}€
    </div>
    
    <button>Acheter</button>
</div>
@endsection