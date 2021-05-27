@extends('layouts.master')

@section('content')
<button><a href="{{route('product.create')}}">Ajouter un produit</a></button>

{{$products->links()}}
@include('back.partials.flash')

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Category</th>
            <th>Prix</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td><a href="{{route('product.edit', $product->id)}}">{{$product->name}}</a></td>
            <td>{{$product->category->gender ?? "Pas de catégorie" }}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->published_state}}</td>
            <td><a href="{{route('product.edit', $product->id)}}">Update</a></td>
            <td>
                <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-danger" type="submit" value="delete" >
                </form>
            </td>
        </tr>
        @empty
        <tr>Désolée pour l'instant aucun produit n'est publié sur le site</tr>
        @endforelse
    </tbody>
</table>    
@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection

<style>
    tr>th,
    tr>td {
        padding: 10px 20px;
    }
</style>