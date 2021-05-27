@extends('layouts.master')

@section('content')
<div>
    <h1>{{$product->name}}</h1>

    @if(!empty($product->picture))
    <img src="{{asset('images/'.$product->picture->link)}}" alt="picture of article">
    @endif

    {{$product->description}}
    <div>
        <label for="size">Taille :</label>
        <select id="size" name="size">
            @forelse ($product->sizes as $size)
            <option value="{{$size->value}}">{{$size->value}}</option>
            @empty
                Pas de tailles disponibles pour cet article
            @endforelse
        </select>
    </div>
    <div>
        {{$product->price}}€
    </div>
    
    <button>Acheter</button>
</div>
@endsection