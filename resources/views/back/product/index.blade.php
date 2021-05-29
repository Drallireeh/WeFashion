@extends('layouts.master')

@section('content')
<div class="admin-ctn">
    <h1>Administration des produits</h1>

    <div class='btn-add-ctn'>
        <a class="btn btn-success add-product" href="{{route('product.create')}}">Ajouter un produit</a>
    </div>
    
    @include('back.partials.flash')
    
    <div class="product-admin-ctn">
        <div class="back-titles">
            <h2>Nom</h2>
            <h2>Catégorie</h2>
            <h2>Prix</h2>
            <h2>Status</h2>
            <h2>Modification</h2>
            <h2>Suppression</h2>
        </div>
        @forelse($products as $product)
            <div class="lines">
                <div><a href="{{route('product.edit', $product->id)}}">{{$product->name}}</a></div>
                <div>{{$product->category->gender ?? "Pas de catégorie" }}</div>
                <div>{{$product->price}}</div>
                <div>{{$product->published_state == 0 ? "Non publié" : "Publié"}}</div>
                <div class="btn-ctn"><a class="btn btn-primary" href="{{route('product.edit', $product->id)}}">Modifier</a></div>
                <div class="btn-ctn">
                    <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="lines no-result">Désolée pour l'instant aucun produit n'est publié sur le site</div>
            @endforelse
    </div>
    
    <div class="paginate-ctn">
        {{$products->links()}}
    </div>
</div>


@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection