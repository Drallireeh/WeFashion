@extends('layouts.master')

@section('content')
<h1>Produits de la gamme {{$category->gender}}</h1>
<h2>{{count($products)}} résultats</h2>

<div class="list-group">
    @forelse($products as $product)
    <a class="list-group-item" href="{{url('product', $product->id)}}">
        <h3>{{$product->name}}</h3> 
        @if(!empty($product->picture))
        <div class="img-ctn">
            <img src="{{asset('images/'.$product->picture->link)}}" alt="photo de l'article">
        </div>
        @endif
        <p class="price">
            {{$product->price}} €
        </p>
    </a>
    @empty
    <div class="no-result">Aucun produit n'est disponible pour la gamme {{$category->gender}}, veuillez réessayer ultérieurement</div>
    @endforelse

</div>
<div class="paginate-ctn">
    {{$products->links()}}
</div>

@endsection