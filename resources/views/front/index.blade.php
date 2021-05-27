@extends('layouts.master')

@section('content')
<h1>Tous les Produits</h1>
<span>{{count($products)}} résultats</span>

<div class="list-group">
    @forelse($products as $product)
    <div class="list-group-item">
        <a href="{{url('product', $product->id)}}">{{$product->name}}</a> 
        <h2></h2>
        <div>
            {{$product->price}}
        </div>
        @if(!empty($product->picture))
        <div class="img-ctn">
            <img src="{{asset('images/'.$product->picture->link)}}" alt="view of article">
        </div>
        @endif
    </div>
    @empty
    <div>Aucun produit n'est disponible, veuillez réessayer ultérieurement</div>
    @endforelse

</div>

{{$products->links()}}

@endsection