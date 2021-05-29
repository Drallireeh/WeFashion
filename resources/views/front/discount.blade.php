@extends('layouts.master')

@section('content')
<h1>Produits en solde</h1>
<h2>{{count($products)}} résultats</h2>

<div class="list-group">
    @forelse($products as $product)
    <a href="{{url('product', $product->id)}}" class="list-group-item">
        <h3>{{$product->name}}</h3> 
        @if(!empty($product->picture))
        <div class="img-ctn">
            <img src="{{asset('images/'.$product->picture->link)}}" alt="photo de l'article">
        </div>
        @endif
        <p class="price">
            <span class="initial-price">{{$product->price}}€</span>=><span class="discount-price"> {{round($product->price - ($product->price * 0.25), 2)}}€ (-25%)</span>
        </p>
    </a>
    @empty
    <div class="no-result">Aucun produit n'est actuellement en solde.</div>
    @endforelse

</div>
<div class="paginate-ctn">
    {{$products->links()}}
</div>

@endsection