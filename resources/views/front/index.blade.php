@extends('layouts.master')

@section('content')
<h1>Tous les Produits</h1>
<h2>{{count($products)}} résultats</h2>

<div class="list-group">
    @forelse($products as $product)
    <div class="list-group-item">
        <a href="{{url('product', $product->id)}}">{{$product->name}}</a> 
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
    </div>
    @empty
    <div class="no-result">Aucun produit n'est disponible, veuillez réessayer ultérieurement</div>
    @endforelse

</div>
<div class="paginate-ctn">
    {{$products->links()}}
</div>

@endsection