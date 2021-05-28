@extends('layouts.master')

@section('content')
<div class="product-informations">
    <h1>{{$product->name}}</h1>

    <div class="informations-ctn">
        <div class='product-img-ctn'>
            @if(!empty($product->picture))
            <img src="{{asset('images/'.$product->picture->link)}}" alt="picture of article">
            @endif
        </div>

        <div class="product-display">
            <p><span class="product-labels">Description : </span>{{$product->description}}</p>
            <div class="select-ctn">
                <label class="product-labels" for="size">Taille :</label>
                <select id="size" name="size">
                    @forelse ($product->sizes as $size)
                    <option value="{{$size->value}}">{{$size->value}}</option>
                    @empty
                        Pas de tailles disponibles pour cet article
                    @endforelse
                </select>
            </div>
            <div>
                <span class="product-labels">Prix :</span>
                @if ($product->discount) 
                <span class="initial-price">{{$product->price}}€</span>=><span class="discount-price"> {{round($product->price - ($product->price * 0.25), 2)}}€ (-25%)</span>
                @else 
                    {{$product->price}}€
                @endif
            </div>
            <button class='btn btn-primary'>Ajouter au panier</button>
        </div>
    </div>
    
</div>
@endsection