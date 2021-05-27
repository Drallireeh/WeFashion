@extends('layouts.master')

@section('content')

<h1>Produits de la gamme pour {{$category->gender == "male" ? "homme" : "femme"}}</h1>
    <span>{{count($products)}} résultats</span>

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
    <li>Aucun produit n'est disponible pour la gamme {{$category->gender == "male" ? "homme" : "femme"}}, veuillez réessayer ultérieurement</li>
    @endforelse
    
</ul>
{{$products->links()}}
@endsection