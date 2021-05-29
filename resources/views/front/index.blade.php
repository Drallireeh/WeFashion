@extends('layouts.master')

@section('content')
<h1>Tous les Produits</h1>
<h2>{{count($products)}} résultats</h2>

<div class="list-group">
    @forelse($products as $product)
    <a href="{{url('product', $product->id)}}" class="list-group-item">
        <h3>{{$product->name}}</h3> 
        @if(!empty($product->picture))
        <div class="img-ctn">
            <img src="{{asset('images/'.$product->picture->link)}}" alt="photo de l'article">
        </div>
        @else
        <div class="img-ctn">
            <img src="{{asset('images/no_image.png')}}" alt="Pas de photo">
        </div>
        @endif
        <p class="price">
            {{$product->price}} €
        </p>
    </a>
    @empty
    <div class="no-result">Aucun produit n'est disponible, veuillez réessayer ultérieurement</div>
    @endforelse

</div>
<div class="paginate-ctn">
    {{$products->links()}}
</div>

@endsection