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
            <option @if($product->size == 'XS') selected @endif value="XS">XS</option>
            <option @if($product->size == 'S') selected @endif value="S">S</option>
            <option @if($product->size == 'M') selected @endif value="M">M</option>
            <option @if($product->size == 'L') selected @endif value="L">L</option>
            <option @if($product->size == 'XL') selected @endif value="XL">XL</option>
        </select>
    </div>
    <div>
        {{$product->price}}€
    </div>
    
    <button>Acheter</button>
</div>
@endsection