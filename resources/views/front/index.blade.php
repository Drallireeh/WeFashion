@extends('layouts.master')

@section('content')
<h1>Tous les Produits</h1>
<ul class="list-group">
    @forelse($products as $product)
    <li class="list-group-item">
        <a href="{{url('product', $product->id)}}">{{$product->name}}</a> 
        <h2></h2>
        <div>
            {{$product->price}}
        </div>
        @if(!empty($product->picture))
        <img src="{{asset('images/'.$product->picture->link)}}" alt="view of article">
        @endif
    </li>
    @empty
    <li>Aucun produit n'est disponible, veuillez réessayer ultérieurement</li>
    @endforelse
    
</ul>
@endsection